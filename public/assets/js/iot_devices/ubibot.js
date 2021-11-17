function getIotDevicesData(farm_slug){

    $('#room_temp').text("Syncing...");
    $('#humidity').text("Syncing...");
    $('#indoor_light').text("Syncing...");
    $('#soil_temp').text("Syncing...");

    $('#wind_dir').text("Syncing...");
    $('#wind_speed').text("Syncing...");
    $('#outdoor_humidity').text("Syncing...");
    $('#outdoor_temp').text("Syncing...");

    $('#relative_pressure').text("Syncing...");
    $('#daily_rain').text("Syncing...");
    $('#solar_radiation').text("Syncing...");
    $('#uvi').text("Syncing...");

    var ubibot_channel_id;
    var ubibot_account_key;
    var ambient_mac_address;
    var ambient_app_key;
    var ambient_api_key;

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "https://lazarusmissions.com/getIotDevicesData/farm" + '/' + farm_slug,
        success: function (response) {
            ubibot_account_key = response.ubibot_account_key;
            ubibot_channel_id = response.channel_id;
            ambient_mac_address = response.ambient_mac_address;
            ambient_app_key = response.ambient_app_key;
            ambient_api_key = response.ambient_api_key;

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: 'https://api.ubibot.com/channels/'+ubibot_channel_id+'?account_key='+ ubibot_account_key,
                success: function (data) {
                    var values = JSON.parse(data.channel.last_values);
        
                    var room_temp = values.field1.value.toFixed(2);
                    var humidity = values.field2.value.toFixed(2);
                    var light = values.field3.value.toFixed(2);
                    var soil_temp = values.field7.value.toFixed(2);
                    
        
                    $('#room_temp').text(room_temp + " " +  String.fromCharCode(176) + "C");
                    $('#humidity').text(humidity + " %");
                    $('#indoor_light').text(light + " Klux" );
                    $('#soil_temp').text(soil_temp + " " +  String.fromCharCode(176) + "C");
        
                    setTimeout(function(){
                        Snackbar.show({
                            text: "IoT Data Synced Successfully",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#8dbf42'
                        });
                    },500); // milliseconds
                },
                error:function(response){
                    setTimeout(function(){
                        $('#room_temp').text("N/A");
                        $('#humidity').text("N/A");
                        $('#indoor_light').text("N/A");
                        $('#soil_temp').text("N/A");
                        Snackbar.show({
                            text: "Data Syncing failed from Iot Devices. Device may be offline or no internet connection",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    },2000);
                    
                }
            });

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: 'https://api.ambientweather.net/v1/devices?applicationKey='+ambient_app_key+'&apiKey='+ambient_api_key,
                success: function (data) {

                    var wheatherData = data.filter(function(i){
                        return i.macAddress === ambient_mac_address; 
                    })[0];

                    console.log(wheatherData.lastData);

                    $('#wind_dir').text(wheatherData.lastData.winddir + String.fromCharCode(176) );
                    $('#wind_speed').text((wheatherData.lastData.windspeedmph *1.609344) .toFixed(2)+ " Km/h");
                    $('#outdoor_humidity').text(wheatherData.lastData.humidity+ " %");
                    $('#outdoor_temp').text(((wheatherData.lastData.tempf-32)* 5 / 9).toFixed(2)+ " "+String.fromCharCode(176)+"C");

                    $('#relative_pressure').text((wheatherData.lastData.baromrelin * 25.4 ).toFixed(2)+ " mmHg");
                    $('#daily_rain').text((wheatherData.lastData.dailyrainin *  25.4).toFixed(2)  + " mm");
                    $('#solar_radiation').text((wheatherData.lastData.solarradiation / 7.9).toFixed(2) + " Klux");
                    $('#uvi').text(wheatherData.lastData.uv);

                            
                    
                },
                error:function(response){
                    setTimeout(function(){
                        $('#room_temp').text("N/A");
                        $('#humidity').text("N/A");
                        $('#indoor_light').text("N/A");
                        $('#soil_temp').text("N/A");
                        $('#wind_dir').text("N/A");
                        $('#wind_speed').text("N/A");
                        $('#outdoor_humidity').text("N/A");
                        $('#outdoor_temp').text("N/A");

                        $('#relative_pressure').text("N/A");
                        $('#daily_rain').text("N/A");
                        $('#solar_radiation').text("N/A");
                        $('#uvi').text("N/A");
                        Snackbar.show({
                            text: "Data Syncing failed from Iot Devices. Device may be offline or no internet connection",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    },2000);
                    
                }
            });
        
            setInterval(function() {
                getIotDevicesData(farm_slug)
            }, 60 * 1000 * 15); // 60 * 1000 * 15 milsec (Every 15 Minutes)
        }
    });
}
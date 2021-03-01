<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>

    <body>
       
           

            <div class=" text-center">
                <h1>Ebox Online Skill Test</h1>
            </div>

        
            <div class="container" >
                <div class="row" align="w3-right-align">
                <div class="col-sm-3 w3-panel w3-border w3-round-large" >
                    <div>
                        <label class="control-label" id="active">Cases Confirm </b></label>
                    </div>
                    <div >
                        <label class="control-label" id="case">Total Confirm </b></label>
                    </div>           
                </div>
        
                <div class="col-sm-3 w3-panel w3-border w3-round-large w3-margin-left" >
                    <div>
                        <label class="control-label">Recovered Today </b></label>
                    </div>
                    <div >
                        <label class="control-label">Total Recovered </b></label>
                    </div>           
                </div>

                <div class="col-sm-3 w3-panel w3-border w3-round-large w3-margin-left" >
                    <div>
                        <label class="control-label">Deaths Today </b></label>
                    </div>
                    <div >
                        <label class="control-label">Total Death </b></label>
                    </div>           
                </div>
            </div>



            <div align="center">
                <!--<button type="button" class="detail w3-button w3-white w3-border" title="Save"> Countries List Dropdown </button>-->
                <form id="myForm">
                    <select id="selectNumber" class="form-control col-sm-3" value="" onchange="view_by_country()">
                        <option value=''>Countries List Dropdown</option>
                        skjp ye okk
                    </select>
                </form>
            </div>
           

           
            
       

    </body>
</html>


<script>
    
    $(function() {

        $.ajax({
            url:"https://restcountries.eu/rest/v2/all",
            method:'GET',
            dataType:'JSON',
            //cache: false,
            data:{
                
            },
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            success:function(response){
                for (var i = 0; i <=  response.length; i++) {
                    $('#selectNumber').append('<option value="' + response[i].name + "\">" + response[i].alpha3Code + " - " +response[i].name + '</option>');
                }
                // var v = this;
                // v.countries = response;
            },error:function(response){
                console.log(response);
            }
        });
    
        $.ajax({
            url:"https://disease.sh/v3/covid-19/all",
            method:'GET',
            dataType:'JSON',
            //cache: false,
            data:{
                
            },
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            success:function(response){
                $('#active').html(response.active);
                $('#case').html(response.cases);
                console.log(response);
            },error:function(response){
                console.log(response);
            }
        });

    });

    function view_by_country(){
        var country = $('#selectNumber').val();
        if(country!=''){
            $.ajax({
                //url:"https://disease.sh/v3/covid-19/all",
                url:"https://disease.sh/v3/covid-19/countries/"+country,
                method:'GET',
                dataType:'JSON',
                //cache: false,
                data:{
                    
                },
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                success:function(response){
                    $('#active').html(response.active);
                    $('#case').html(response.cases);
                    console.log(response);
                },error:function(response){
                    
                }
            }); 
        }else{
            $.ajax({
                url:"https://disease.sh/v3/covid-19/all",
                method:'GET',
                dataType:'JSON',
                //cache: false,
                data:{
                    
                },
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                success:function(response){
                    $('#active').html(response.active);
                    $('#case').html(response.cases);
                    console.log(response);
                }
            });
        }    
    }

</script>
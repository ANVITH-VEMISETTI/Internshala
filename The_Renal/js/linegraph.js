$(document).ready(function(){
    $.ajax({
        url : "http://localhost/The_Renal/patientdata.php",
        type : "GET",
        success : function(data){

            var patientid = [];
            var Admitted = [];

            for(let i in data){
                patientid.push(data[i].id);
                Admitted.push(data[i].Admitted);
            }
            console.log(patientid)
            

            var chardata = {
                labels : Admitted,
                datasets : [
                    {
                        label : "Patientcount",
                        fill : false,
                        lineTension : 0.1,
                        backgroundColor : "rgba(59,89,152,0.75)",
                        borderColor : "rgba(59,89,152,1)",
                        pointHoverBackgroundColor : "rgba(59,89,152,1)",
                        pointHoverBorderColor : "rgba(59,89,152,1)",
                        data : patientid
                    }
                ]
            };

            var ctx = $("#mycanvas");
            var LineGraph = new Chart(ctx, {
                type : 'line',
                data : chardata
            });
        },
        error : function(data){

        }
    })

});
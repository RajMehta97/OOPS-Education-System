$(document).ready(function(){
  $.ajax({
    url:"http://localhost/proj/data.php",
    method:"GET",
    success:function(data){
      console.log(data);
      var subject =["Physics", "Chemistry" ,"Maths","Computer Science"];
      var score =[];
      for(var i in data){
        score.push(data[i]);
      }

      var chartdata = {
          labels:subject,
          datasets :[
            {
              label:'Score',
              background color: 'rgba(200,200,200,0.75)',
              borderColor: 'rgba(200,200,200,0.75)',
              hoverBackgroundColor : 'rgba(200,200,200,1)',
              hoverBorderColor:'rgba(200,200,200,1)',
              data:score
            }
          ]
      };
      var ctx= $("#mycanvas");

      var barGraph = new Chart(ctx,{
        type: 'bar',
        data: chartdata
      })
    },
    error:function(data){
      console.log(data);
    }
  });
});

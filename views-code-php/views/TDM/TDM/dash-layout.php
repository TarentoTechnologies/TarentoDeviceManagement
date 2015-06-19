<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<head>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
 
</head>
<body>


<section class="content">

                    <div class="row" style="margin-bottom:5px;" id="deviceDiv" name="deviceDiv">

                       <div class="col-md-3 col-sm-6" id="eachdevice1" name="eachdevice1" style="text-align:center;">
                           
                       </div>
                        
                        <div class="col-md-3 col-sm-6" id="eachdevice2" name="eachdevice2" style="text-align:center;">
                           
                       </div>

                       <div class="col-md-3 col-sm-6" id="eachdevice3" name="eachdevice3" style="text-align:center;">
                           
                       </div>

                       <div class="col-md-3 col-sm-6" id="eachdevice0" name="eachdevice4" style="text-align:center;">
                           
                       </div>

                       <div class="col-md-3 col-sm-6" id="eachdevicedata" name="eachdevicedata" style="text-align:center;">
                           
                       </div>



                    </div>
                    <div class="row" style="margin-bottom:5px;" id="pieDiv" name="pieDiv">
                    </div>
                    
                    <!-- Main row -->
                    

                    <div class="row" style="margin-bottom:5px;" id="alertsDiv">

                      <div class="col-md-6" id="alert">
                      <div class="panel">
                      <header class="panel-heading"> Alerts </header>
                      <div class="panel-body table-responsive">
                          <table class='table table-hover'>
                            
                            <tbody id="alerttable">
                              <tr>
                                <th>Tag</th>
                                <th>Status</th>
                                <th>Last Verified</th>
                              </tr>
                            </tbody>

                          </table>
                          </div>
                          </div>
                      </div>
                  
                      <div class="col-md-6" id="activity">
                       <div class="panel">
                      <header class="panel-heading"> Activities </header>
                      <div class="panel-body table-responsive">
                          <table class='table table-hover'>
                            
                            <tbody id="activitytable">
                              <tr>
                                <th  >Tag</th>
                                <th  >Owner</th>
                                <th  >Assigned on</th>
                              </tr>
                            </tbody>

                          </table>
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="row" >

                        <div class="col-md-12">
                                                   
                        <table>
                          <tbody id="tbl_dash"></tbody>
                        </table>
                        </div><!--end col-6 -->
          

                    </div>

                    

                     <div class="row" id="graphView" name="graphView">
                      <div class="col-md-12 col-xs-12" id="chartheader">
                       <div class="panel">
                        <header class="panel-heading">
                          <div class=row>
                            <div class="col-md-6 col-xs-6">
                              Device assigned details 
                            </div>
                            <div class="col-md-6 col-xs-6">
                              <select id="deviceSelect" name="deviceSelect" onchange="selectFunction()" style="float:right;border:none;background-color:#fafafa;text-align:center;" ></select> 
                            </div>
                          </div>
                        </header>
                        
                        <div class="panel-body table-responsive">
                          <div style="width:100%;" id="chart" name="chart"></div>
                        </div>
                        
                       </div>
                      </div>
                  

                     </div>
                     
                </section><!-- /.content -->




<SCRIPT>

</SCRIPT>



   <script type="text/javascript">
  

$(document).ready(function()
  {
    totalExe();    
   });
   var getResultData;    


function totalExe()
{
  var stuff = new Object();
    stuff = {'appId':'1','apiToken':'111111'};
    
     $.ajax({
    url: 'device-management/list-device-types',
    type: 'POST',
   
    data: JSON.stringify(stuff),

    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function(result) {
    
    var getres=result["responseData"][0];
    getResultData=result;

      $.each(getres, function(i, item) {
         
          var getres1=result["responseData"][2];
        
          $.each(getres1, function(j, item) {
             
             if (getres[i].type==getres1[j].type)
             {
                avail=getres1[j].cnt;
             }
          })

          
          var mm=(4%4);
         
          //document.getElementById("eachdevice"+((i+1)%4)).innerHTML +="<div class='sm-st clearfix'><span class='sm-st-icon st-red'><i class='fa fa-check-square-o'></i></span><div class='sm-st-info'><span>"+(getres[i].cnt)+"</span>"+(getres[i].type)+"</div></div><div class='progress'><div class='progress-bar progress-bar-success' style='width: "+((avail/(getres[i].cnt))*100)+"%'>Available: "+avail+"</div><div class='progress-bar progress-bar-warning progress-bar-striped' style='width: "+(100-((avail/(getres[i].cnt))*100))+"%'>Assigned: "+(getres[i].cnt-avail)+"</div></div>";
          document.getElementById("eachdevice"+((i+1)%4)).innerHTML +="<form id=myform"+(getres[i].type)+" action=devicesPost method=POST><input type=hidden value="+(getres[i].type)+" id=hidtype name=hidtype><a id=dev_id name=dev_id style='color:black;cursor:pointer;' onclick=document.getElementById('myform"+(getres[i].type)+"').submit();><div class='sm-st clearfix'><span class='sm-st-icon st-red'><i class='fa fa-check-square-o'></i></span><div class='sm-st-info'><span>"+(getres[i].cnt)+"</span>"+(getres[i].type)+"</div></div></a></form><div class='progress'><form id=myformAvail"+(getres[i].type)+" action=devicesStatus method=POST><input type=hidden value="+(getres[i].type)+" id=hidtype name=hidtype><input type=hidden value=Available id=hidstatus name=hidstatus><a id=dev_id name=dev_id style='color:black;cursor:pointer;' onclick=document.getElementById('myformAvail"+(getres[i].type)+"').submit();><div class='progress-bar progress-bar-success' style='width: "+((avail/(getres[i].cnt))*100)+"%'>Available: "+avail+"</div></a></form><form id=myformAssign"+(getres[i].type)+" action=devicesStatus method=POST><input type=hidden value="+(getres[i].type)+" id=hidtype name=hidtype><input type=hidden value=Assigned id=hidstatus name=hidstatus><a id=dev_id name=dev_id style='color:black;cursor:pointer;' onclick=document.getElementById('myformAssign"+(getres[i].type)+"').submit();><div class='progress-bar progress-bar-warning progress-bar-striped' style='width: "+(100-((avail/(getres[i].cnt))*100))+"%'>Assigned: "+(getres[i].cnt-avail)+"</div></a></form></div>";



          
          var typedev=getres[i].type;
        

         var piegetres=result["responseData"][1];
         var piedata=[];
         var counter=0;
         
    
      $.each(piegetres, function(k, item) {
         
          if(typedev==piegetres[k].type)
         {
          piedata[counter++]={"label":piegetres[k].version,"value":piegetres[k].cnt,"cat":piegetres[k].type};
        }
      })
      











/* Donut Chart Begins*/


var chartid="#eachdevice"+((i+1)%4);
var data =piedata;
 
var margin = {top:40,left:40,right:40,bottom:40};
width = 300;
height = 300;
radius = Math.min(width,height)/2;
var color = d3.scale.category20c()
.range(["#e53517", "#6b486b", "#ffbb78","#7ab51d","#6b486b","#e53517","#7ab51d","#ff7f0e","#ffc400"]);
var arc = d3.svg.arc()  
         .outerRadius(radius -100)
         .innerRadius(radius - 30);
var arcOver = d3.svg.arc()  
.outerRadius(radius +50)
.innerRadius(0);
var svg = d3.select(chartid).append("svg")
          .attr("width",width)
          .attr("height",height)
          .append("g")
          .attr("transform","translate("+width/2+","+height/2+")");
div = d3.select('body')
.append("div") 
.attr("class", "tooltip");
var pie = d3.layout.pie()
          .sort(null)
          .value(function(d){return d.value;});
var g = svg.selectAll(".arc")
        .data(pie(data))
        .enter()
        .append("g")
        .attr("class","arc")
         .on("mousemove",function(d){
          var mouseVal = d3.mouse(this);
          //alert(mouseVal[1]);
          div.style("display","none");
          div
          .html("<b>version</b>:"+d.data.label+"</br>"+"<b>Count</b>:"+d.data.value)
            .style("left", (d3.event.pageX-12) + "px")
            .style("top", (d3.event.pageY-(radius-50)) + "px")
            .style("width", 15 + "%")
            .style("font-size", 100 + "%")
            .style("opacity", 1)
            .style("display","block");
        })
        .on("mouseout",function(){div.html(" ").style("display","none");})
        .on("click",function(d){/*alert(d.data.cat);*/            
          var form = $(document.createElement('form'));
          $(form).attr("action", "/devicesPie");
          $(form).attr("method", "POST");

          var input1 = $("<input>").attr("type", "hidden").attr("name", "hidtype").val(d.data.cat);
          var input2 = $("<input>").attr("type", "hidden").attr("name", "hidversion").val(d.data.label);
          $(form).append($(input1));
          $(form).append($(input2));
          form.appendTo( document.body )
          $(form).submit();
          
        })
        
        
    g.append("path")
    .attr("d",arc)
    .style("fill",function(d){return color(d.data.label);});

                svg.selectAll("text").data(pie(data)).enter()
                 .append("text")
                 .attr("class","label1")
                 .attr("transform", function(d) {
                 var dist=radius-15;
               var winkel=(d.startAngle+d.endAngle)/2;
               var x=dist*Math.sin(winkel)-4;
               var y=-dist*Math.cos(winkel)-4;
               
               return "translate(" + x + "," + y + ")";
                })
                .attr("dy", "0.35em")
                .attr("text-anchor", "middle")
                
              .text(function(d){
                //return d.value;
              });
              
     

/*Donut Chart End*/


      })




    var getres=result["responseData"][3];
      $.each(getres, function(i, item) {
        var d = new Date("Thu May 14 2015 12:58:55 GMT+0530 (IST)");
        var d1 = new Date()-24;
         if (getres[i].status==1 & (getres[i].hourdiff)>24)
         {
          document.getElementById("alerttable").innerHTML +="<tr><td>"+(getres[i].device_id)+"</td><td><div class='progress'><div class='progress-bar progress-bar-danger' style='width: 100%'>Not Verified</div></div></td><td>"+(getres[i].track_create)+"</td></tr>";
         }

      })
var getres=result["responseData"][4];
      //document.getElementById("alert").innerHTML +="<table class='table table-hover'><tr><th colspan='3'>Alerts</th></tr>";
      $.each(getres, function(i, item) {
        var d = new Date("Thu May 14 2015 12:58:55 GMT+0530 (IST)");
        var d1 = new Date()-24;
        document.getElementById("activitytable").innerHTML +="<tr><td>"+(getres[i].device_id)+"</td><td>"+(getres[i].first_name)+"</td><td> "+(getres[i].track_create)+"</td></tr>";
        
      })






 var getres=result["responseData"][0];
      
    
      $.each(getres, function(i, item) {
          
        
         var exists = false;
          $('#deviceSelect').each(function(){
              if (this.value == getres[i].type) {
                  exists = true;
                  return false;
              }
          });
          if(exists==false)
          {
            document.getElementById("deviceSelect").innerHTML += "<option value="+getres[i].type+">"+getres[i].type+"</option>"
          }

        
      })



selectFunction();

    
  }
});
}







var dataarr=[];
var categoryarr=[{}];
      
function selectFunction()
{
    dataarr=[];
    categoryarr=[{}];

    result=getResultData;

      getres=result["responseData"][5];
     var datacnt=0;
    
      $.each(getres, function(i, item) {
    
       
         if($('#deviceSelect').val()==getres[i].type || $('#deviceSelect').val()=="all")
          {
            dataarr[datacnt]=parseInt(getres[i].diff);         
    
            categoryarr[datacnt]={"name":getres[i].id,"longName":getres[i].first_name,"value":getres[i].diff};
            datacnt++;
          }
         
        
      })



var datacounter=dataarr.length;
var datacounter1=datacounter;
/*dataarr[datacounter]=0;
categoryarr[datacounter]={"name":"","longName":"nil","value":"nil"};*/

while (datacounter<50) {
  dataarr[datacounter]=0;
  var spc=datacounter1;
  var namespc="";
  while(spc<datacounter)
  {
    namespc+=" ";
    spc+=1;
  }
  categoryarr[datacounter]={"name":namespc,"longName":"nil","value":"nil"};
  datacounter+=1;
  console.log(dataarr);
}

document.getElementById("chart").innerHTML="";
var data = {
    chartTitle: "",
    xAxisLabel: "Device's ID",
    yAxisLabel: "Days",
    series: [{
        name: "",
        longName: "",
        value: "i",
        data: dataarr
    }],

    categories: categoryarr
    
}


var format = d3.format('.2s');

var returnArray = [];

var canvasWidth = document.getElementById("chart").offsetWidth,
    canvasHeight = document.getElementById("chart").offsetHeight;

var margin = { top: 30, right: 0, bottom: 60, left: 30 },
    width = canvasWidth - margin.left - margin.right,
    height = canvasHeight - margin.top - margin.bottom;

var x0 = d3.scale.ordinal()
    .rangeRoundBands([0, width], 0.1, 0.2);

var x1 = d3.scale.ordinal();

var y = d3.scale.linear()
    .range([height, 0]);

var color = ['#5cb85c', 'rgb(41,95,72)', 'rgb(82,82,20)', 'rgb(43,33,6)', 'rgb(96,35,32)', 'rgb(54,69,79)'];


var xAxis = d3.svg.axis()
    .scale(x0)
    .orient("bottom")


    

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")


var tip = d3.tip()
    .attr('class', 'd3-tip')
    .offset([0, 0])
    .html(function (d) {
        
        return "<b>Days</b>: <span style='color:black;'>" + d.data[d.index] + "</span><br/>"
                + "<b>User</b>: <span style='color:back;'>" + data.categories[d.index].longName + "</span>";                
    });

var legendTip = d3.tip()
    .attr('class', 'd3-tip')
    .offset([-10, 0])
    .html(function (d) {
        return "<span style='color:green;'>" + d.longName + "</span>";
    });

var svg = d3.select("#chart").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


for (var i = 0; i < data.series.length; i++) {

    var rgbColor = d3.rgb(color[i]);
    var rgbLighterColor = d3.rgb(color[i]).brighter(4);
    var id = 'gradient' + i;
    var gradient = svg.append("svg:defs")
    .append("svg:linearGradient")
    .attr('id', id)
    .attr("x1", "0%")
    .attr("y1", "0%")
    .attr("x2", "100%")
    .attr("y2", "100%");

   

    gradient
        .append("stop")
        .attr("offset", "100%")
        .attr("stop-color", rgbColor)
}


svg.call(tip);
svg.call(legendTip);

x0.domain(data.categories.map(function (d) { return d.name; }));
//x1.domain(data.series.map(function (d) { return d.name })).rangeRoundBands([0, x0.rangeBand()]);
x1.domain(data.series.map(function (d) { return d.name })).rangeRoundBands([0, x0.rangeBand()]);
y.domain([0, d3.max(data.series, function (d) { return d3.max(d.data); })]);

svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + height + ")")
    .call(xAxis)


    

svg.append("g")
    .attr("class", "y axis")
    .call(yAxis)
    .append("text")
    .attr("y", 15)
    .attr("x", -15)
    .style("text-anchor", "end")
    .attr("transform", "rotate(-90)")
    .attr('class', 'chartLabel')
    .text(data.yAxisLabel)


var state = svg.selectAll(".state")
    .data(data.categories)    
    .enter().append("g")
    .attr("class", "state")
    .attr("transform", function (d) { return "translate(" + x0(d.name) + ",0)"; });

var bars = state.selectAll("rect")
    .data(function (d, i) {
        var rArray = [];
        for (var x = 0; x < data.series.length; x++) {
            rArray.push({ name: data.series[x].name, data: data.series[x].data, index: i, seriesLongName: data.series[x].longName });
        }

        return rArray;
    })    
    .enter().append("rect")
    .on('click', function (d) {
        if (d3.event.ctrlKey) {
            if (d3.select(this).style('opacity') == 1) {
                returnArray.push({ categoryName: data.categories[d.index].name, seriesName: d.name, data: d.data[d.index] });
                d3.select(this).style('opacity', 0.5);
            }
            else {
                returnArray.forEach(function (obj, i) {
                    if (obj.categoryName == data.categories[d.index].name && obj.seriesName == d.name && obj.data == d.data[d.index])
                        returnArray.splice(i, 1);
                });
                d3.select(this).style('opacity', 1);
            }
        }
        else {
            var rect = svg.selectAll('rect');
            rect.forEach(function (rec) {
                rec.forEach(function (r) {
                    returnArray = [];
                    r.style.opacity = 1;
                })
            });
            if (d3.select(this).style('opacity') == 1) {
                d3.select(this).style('opacity', 0.5);
                returnArray.push({ categoryName: data.categories[d.index].name, seriesName: d.name, data: d.data[d.index] });
            }
        }

    })
    .on('contextmenu', function (d) {
        d3.event.preventDefault();
        
    })
    .on('mouseover', tip.show)
    .on('mouseout', tip.hide)
    .attr('class', 'bar')
    .attr("width", x1.rangeBand())
    .attr("x", function (d) { return x1(d.name); })
    .attr("y", height)
    .attr("height", 0)
    .style("fill", function (d, i) { return "url(#gradient"+i+")" });


bars.transition()
    .attr('y', function (d) { return y(d.data[d.index]); })


    .attr('height', function (d) { return height - y(d.data[d.index]); })
    //.attr('width', 10)
    .delay(function (d, i) {
        return i * 250;
    }).ease('elastic');


svg.append("text")
.attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom / 2) + ")")
.style("text-anchor", "middle")
.attr('class', 'chartLabel')
.text(data.xAxisLabel);


svg.append("text")
.attr("transform", "translate(" + (width / 2) + " ," + "0)")
.style("text-anchor", "middle")
.attr('class', 'chartTitle')
.text(data.chartTitle);


d3.select("svg").on('contextmenu', function () {
    var d3_target = d3.select(d3.event.target);
    if (!d3_target.classed("bar")) {
        d3.event.preventDefault();
       
    }
});

d3.select("svg").on('click', function () {
    var d3_target = d3.select(d3.event.target);
    if (!(d3_target.classed("bar") || d3_target.classed("legend"))) {
        returnArray = [];
        var rect = svg.selectAll('rect');
        rect.forEach(function (rec) {
            rec.forEach(function (r) {
                r.style.opacity = 1;
            })
        });
    }
});



}


</script>  


<script>


window.onload = function() {


   

}

    </script>
      
</body>
</html>


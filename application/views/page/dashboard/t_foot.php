<script>

window.onload = function () {

  var dps = []; // dataPoints
  var chart = new CanvasJS.Chart("chartContainer", {
    title :{
      text: "Dynamic Data"
    },
    axisY: {
      includeZero: false
    },
    data: [{
      type: "line",
      dataPoints: dps
    }]
  });

  var xVal = 0;
  var yVal = 100;
  var updateInterval = 1000;
  var dataLength = 20; // number of dataPoints visible at any point

  var updateChart = function (count) {
    count = count || 1;

    for (var j = 0; j < count; j++) {
      yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
      dps.push({
        x: new Date(),
        y: yVal
      });
      xVal++;
    }

    if (dps.length > dataLength) {
      dps.shift();
    }

    chart.render();
  };

  updateChart(dataLength);
  setInterval(function(){
    updateChart()
  }, updateInterval);

}

window.setInterval(function(){
  $.ajax({
    type:"POST",
    url: "<?= site_url('dashboard/getData')?>",
    // data: dataSend,
    datatype: 'json',
    success: function(data){
      for (var i = 0; i < 8; i++) {
        $('#data'+i).html(Math.floor(Math.random() * 100) + 1 );
      }
      // console.log(data);
    }, error:function(error){
      console.log(error);
    }
  });

  $.ajax({
    type:"POST",
    url: "<?= site_url('dashboard/getThreshold')?>",
    // data: dataSend,
    datatype: 'json',
    success: function(threshold){
      // console.log(data[0]);
      console.log(threshold);
      var thres = threshold.split(',');
      $('#threshold0').val(thres[0])
      $('#threshold1').val(thres[1])
      $('#threshold2').val(thres[2])
      $('#threshold3').val(thres[3])
      $('#threshold4').val(thres[4])
      $('#threshold5').val(thres[5])
      // var green_up = thres[0];
      // var green_down = thres[1];
      // console.log(thres[0]);
      // console.log(thres[1]);
      // console.log(thres[2]);
      // console.log(thres[3]);
      // console.log(thres[4]);
      // console.log(thres[5]);
      // for (var i = 0; i < 8; i++) {
      //   var data = $('#data'+i).html();
      //   console.log(green_down);
      //   console.log(green_up);
      //   if (data <= 100 && data > green_down) {
      //     // console.log(thres[0]+'=>'+data+'<'+thres[1]+'success');
      //     $('#status'+i).html('<strong class="text-success">Success</stong>');
      //     $('#lamp'+i).removeClass('text-danger');
      //     $('#lamp'+i).removeClass('text-warning');
      //     $('#lamp'+i).addClass('text-success');
      //   }else if (data <=70  && data > 40) {
      //     // console.log(data+'war');
      //
      //     $('#status'+i).html('<strong class="text-warning">Warning</stong>');
      //     $('#lamp'+i).removeClass('text-danger');
      //     $('#lamp'+i).removeClass('text-success');
      //     $('#lamp'+i).addClass('text-warning');
      //   }else if (data <=40  && data > 0) {
      //     // console.log(data+'dang');
      //
      //     $('#status'+i).html('<strong class="text-danger">Danger</stong>');
      //     $('#lamp'+i).removeClass('text-success');
      //     $('#lamp'+i).removeClass('text-warning');
      //     $('#lamp'+i).addClass('text-danger');
      //   }else {
      //     // console.log(data+'err');
      //     $('#status'+i).html('<strong>-</stong>');
      //     $('#lamp'+i).removeClass('text-danger');
      //     $('#lamp'+i).removeClass('text-warning');
      //     $('#lamp'+i).removeClass('text-success');
      //   }
      // }
      // console.log(data);
    }, error:function(error){
      console.log(error);
    }
  });
  changeStatus();
}, 2000);



function changeStatus(){
for (var i = 0; i < 8; i++) {
  var data = $('#data'+i).html();
  if (data <= parseInt($('#threshold0').val()) && data > parseInt($('#threshold1').val())) {
    $('#status'+i).html('<strong class="text-success">Success</stong>');
    $('#lamp'+i).removeClass('text-danger');
    $('#lamp'+i).removeClass('text-warning');
    $('#lamp'+i).addClass('text-success');
  }else if (data <= parseInt($('#threshold2').val())  && data > parseInt($('#threshold3').val())) {
    $('#status'+i).html('<strong class="text-warning">Warning</stong>');
    $('#lamp'+i).removeClass('text-danger');
    $('#lamp'+i).removeClass('text-success');
    $('#lamp'+i).addClass('text-warning');
  }else if (data <= parseInt($('#threshold4').val())  && data > parseInt($('#threshold5').val())) {
    $('#status'+i).html('<strong class="text-danger">Danger</stong>');
    $('#lamp'+i).removeClass('text-success');
    $('#lamp'+i).removeClass('text-warning');
    $('#lamp'+i).addClass('text-danger');
  }else {
    $('#status'+i).html('<strong>-</stong>');
    $('#lamp'+i).removeClass('text-danger');
    $('#lamp'+i).removeClass('text-warning');
    $('#lamp'+i).removeClass('text-success');
  }
}
}




















</script>

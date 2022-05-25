<!--preloader section-->
<div class="modal" id="preloader"style="width:25%; height:150px; margin-top:50px;">
<div class="modal-content" style="padding:0px;">
<h5 style="padding-left: 15px; font-size:22px;font-weight:500;">Please Wait...</h5>
<div class="progress">
  <div class="indeterminate" style="background-color:#ff3d00;"></div>
</div>
</div>
<div class="modal-content" style="padding:10px;">
<h6 id="preloader_heading" style="margin-top:0px;">Login Your Account</h6>
</div>

</div>

<!--preloader section-->

<!-- ye jo niche hai wo upper jo preloder hai uske liye banaya gaya hai niche ka code use work karne ke liye-->
<script>
$(function(){
  $('.modal').modal({
    dismissible:false
  });
  // yhan pe preloder ka code khatam hai
// $('#preloader').modal('open');

//admin login script
$('#btn').click(function(){
  var username = $('input[name="username"]').val();
  var password = $('input[name="password"]').val();

  if(username ==""){
  //  M.toast({html:'Please Enter username'});
  alert("Please Enter username");
  }
  else if(password==""){
       alert("Please Enter password");

  }
  else
  {
   $.ajax({
     type:'ajax',
     method:'POST',
     url:'<?= base_url('admin/loggedin');?>',
     data:{username:username,password:password},
     breforeSend:function(data){
       $('#preloader').modal('open');
     },
     success:function(data){
      $('#preloader').modal('close');
       if(data =='1'){
         window.location.href = '<?= base_url('admin/dashboard');?>';
       }
       else {
         alert("Your Username & Password Do Not Metch");
       }
     },

     error:function(){
       $('#preloader').modal('close');

       alert('Error ! Admin Login Account');
     }
   });
  }
});

//admin login script



});
</script>

<!-- chart wala card ka js code start-->

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Last 7 Days Orders"
	},

	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
      	indexLabelFontSize: 16,
		indexLabelPlacement: "outside",
		dataPoints: [
			{ label: 'Today', y: <?= $chart_data['ch_today_order'];?> },
      { label: 'Yesterday', y:  <?= $chart_data['ch_yesterday_order'];?> },
      { label: '3rd Days', y: <?= $chart_data['ch_last_3_day_order'];?> },
      { label: '4th Days', y: <?= $chart_data['ch_last_4_day_order'];?>  },
      { label: '5th Days', y: <?= $chart_data['ch_last_5_day_order'];?>  },
      { label: '6th Days', y: <?= $chart_data['ch_last_6_day_order'];?>  },
      { label: '7th Days', y: <?= $chart_data['ch_last_7_day_order'];?>  },

		]
	}]
});
chart.render();
}
</script>

<!--count orders script jo dashbord me uper order income show ho rha hai wo hai-->

<script>

count_orders();
 function count_orders(type="all")
 {
   if(type=='all'){
     $('#show_orders_heading').text('Life Time')
   }
   else if (type=='today') {
     $('#show_orders_heading').text('Today Orders')

   }else if (type=='yesterday') {
        $('#show_orders_heading').text('Yesterday Orders')
   }else if (type=='last_30_days') {
     $('#show_orders_heading').text('Last 30 Days Orders')
   }else {
      $('#show_orders_heading').text('Life Time')
   }
   $.ajax({
     type:'ajax',
     method:'GET',
     url:'<?= base_url('admin/count_orders/');?>'+type,
     beforeSend:function(data){
       $('#show_orders').text('Loa.ding..');

     },
     success:function(data){
      $('#show_orders').html(data);
     },

     error:function(){
      $('#show_orders').text('0');
     }
   });
 }
//count orders script

  </script>

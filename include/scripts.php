
	<style type="text/css">
		.alert.success {background-color: #4CAF50;color: white;margin-top: 10px; }
		.closebtn {
		  margin-left: 15px;
		  color: black;
		  font-weight: bold;
		  float: right;
		  font-size: 22px;
		  line-height: 20px;
		  cursor: pointer;
		  transition: 0.3s;
		}
		.alert.danger {background-color: #c52b13 !important;color: white !important;margin-top: 10px !important;border-color:white !important; }
		.alert.info {background-color: rgb(0, 65, 156);color: white ;margin-top: 10px;border-color:white; }
		.alert.warning {background-color: rgb(181, 124, 11) ;color: black;border-color:black;margin-top: 10px; }


		.closebtn:hover {
		  color: red;
		}
  	</style>



 <script>
			 var close = document.getElementsByClassName("closebtn");
			  var i;

			for (i = 0; i < close.length; i++) {
			  close[i].onclick = function(){
			    var div = this.parentElement;
			    div.style.opacity = "0";
			    setTimeout(function(){ div.style.display = "none"; }, 600);
			  }
			}
 </script>

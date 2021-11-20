<html>
<head>
<TITLE>Mahabharata Auto-Suggest</TITLE>
<head>
<style>
body{margin:auto ;
	margin-top: 20%;
  width: 100%;
  height: 100%;
  overflow: hidden;
  padding: 10px;
  background: url('background.jpeg');
  background-repeat: no-repeat;
  background-size: 100% 75%;
  align-content: center; 
}
.frmSearch{
  margin: auto;
  width: 60%;
  padding: 20px;
}
/*.frmSearch {border: 1px solid #d7ffe7;background-color: #d7ffe7;margin: 2px 0px;padding:40px;border-radius:4px;align-content: center;}*/
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 20px;border: orangered 2px solid;border-radius:4px;width: 100%;background-color: hsla(120, 60%, 70%, 0.3); font-size: 25px;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		var valArray=this.value.split(' ');
		var wrd=valArray[valArray.length-1];
		var prevData='';
		$.ajax({
		type: "POST",
		url: "readCountry.php",
		// 'keyword='+$(this).val()
		data:'keyword='+wrd,
		beforeSend: function(){
			$("#search-box").css("background","hsla(120, 60%, 70%, 0.3) url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","hsla(120, 60%, 70%, 0.3)");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
<div class="frmSearch">
<h1 align="center" style="font-family: 'Lucida Console', 'Courier New', monospace; color: orangered;">Mahabharata Auto-Suggestion</h1>
<input type="text" id="search-box" placeholder="Search Here...."/>
<div id="suggesstion-box"></div>
</div>
</body>
</html>
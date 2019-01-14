
<head>
    <title></title>
</head>
<body>

    <link href="css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet"> 
<script language="javascript" type="text/javascript" src="jquery-1.8.2.js"></script> 
<script src="js/jquery-ui-1.9.0.custom.js"></script>



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $(function () {
            var fileName = "auto.pdf";
            $("#btnShow").click(function () {
                $("#dialog").dialog({
                    modal: true,
                    title: fileName,
                    width: 840,
                    height: 850,
                    buttons: {
                        Close: function () {
                            $(this).dialog('close');
                        }
                    },
                    open: function () {
var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"500px\" height=\"300px\">";
object += "If you are unable to view file, you can download from <a href=\"{FileName}\">here</a>";
object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                        object += "</object>";
                        object = object.replace(/{FileName}/g, "Files/" + fileName);
                        $("#dialog").html(object);
                    }
                });
            });
        });
    </script>


    <script language="javascript" type="text/javascript"> 
    $(document).ready(function() { 
    $('#trigger').click(function(){ 
     $("#dialog").dialog(); 
    }); 
    });     
</script>

<a href="#" id="trigger">this link</a> 
<div id="dialog" style="display:none"> 
    <div> 
    <iframe src="../Files/auto.pdf"></iframe> 
    </div> 
</div> 


    <input id="btnShow" type="button" value="Show PDF" />
    <div id="dialog" style="display: none">
    </div>
</body>
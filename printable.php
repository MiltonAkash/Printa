<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title><?php echo $_POST["title"]?></title>
        <style>
            body{font-family:<?php echo $_POST["font"]?>}
            pre{float:clear;display:block;word-wrap: break-word;}
            img{max-width:100%;height:auto;display:block;margin:auto;margin-top:20px;}
            pre{white-space: pre-wrap;}

@page  
{ 
    size: auto; 
    size:21cm 28.5cm;
    /*auto is the initial value*/  
    background:red;
    /* this affects the margin in the printer settings */ 
    margin:2.6cm 1.5cm 1.5cm 2cm;
} 
    img{page-break-after: always;}
body  
{ 
    /* this affects the margin on the content before sending to printer */ 
    margin: 0px;  
} 


/*
        @media print{
            body{margin:2.54c3m;}
        }*/
        </style>
    </head>
    <body>
        <?php
//                if($_POST["title"])
//                    echo "//".$_POST["title"];
                if(sizeof($_FILES))
                    foreach($_FILES as $files){
                        $fileType=pathinfo($files["name"],PATHINFO_EXTENSION);
                        if($fileType=="cpp"||$fileType=="c"){
                           $myfile = fopen($files["tmp_name"], "r") or die("Unable to open file!");
                            echo "<pre>". htmlspecialchars(fread($myfile,filesize($files["tmp_name"])))."</pre>";
                            fclose($myfile);
                        }
                        else if($fileType=='txt'||$fileType=='LST'){
                            $myfile = fopen($files["tmp_name"], "r") or die("Unable to open file!");
                            echo "<pre>". fread($myfile,filesize($files["tmp_name"]))."</pre>";
                            fclose($myfile);
                        }
                        else if($fileType="png"||$fileType="jpg"||$fileType="gif"){
                            
                                $target=upload($files);
                                echo "<img src=".$target."></img>";
                        }
                        else
                            echo "SOrry the Format You gave is not Supoorted!!!. You can include image files,c,cpp,lst,txt,sql files.Most of You upload PDF which is not supported";
                                
                    }
                

        ?>
    </body>
    <script>
        window.print();
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83208698-1', 'auto');
  ga('send', 'pageview');
  alert("Incase of Any Problem Read this: 1. Change the type to 'Save as Pdf'. 2.Uncheck Header and Footer to remove watermark.")
</script>
</html>
<?php 
    function upload($filename){
        $target_file="upload/".basename($filename["name"]);
        if(file_exists($filename["name"]))
            unlink($filename["name"]);
        if(move_uploaded_file($filename["tmp_name"],$target_file))
               return $target_file;
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0,width=device-width"/>
        <title>Printa | Icecandy</title>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="component.css"/>
        <script>
        
                
            $(document).on( 'change','input',function( e )
		{
                    console.log(e);
                        var $input =$(this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();
                        var fileName="Upload File";
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.html( fileName );
			else
				$label.html( labelVal );
                            
                });

        </script>
    </head>
    <style>
        *{box-sizing:border-box;}
        body{margin:0px;}
        .whyprinta{display:flex;background-color:#37474f;background:url("drawable/pattern-bg.png") fixed;flex-direction: column;align-items:center;justify-content: center;min-height:90vh;text-align: center;color:#eee;box-shadow:5px 5px 5px black;}
        .whyprinta p{font-family:'monotype corsiva';display: inline;color:white;font-size:2em;}
        .whyprinta > div{display: flex;flex-wrap: wrap;}
        feat{font-size: 1em;transition:0.5s;position:relative;box-shadow:5px 5px 5px rgba(63,50,63,0.6);;display:flex;margin:10px;align-items:center;justify-content: center;padding:10px;height:150px;
             width:150px;border-radius:50%;background-color:rgba(63,50,63,0.6);;color:white;}
            feat.active{background:white;color:teal;transform:rotateZ(360deg);}
            feat:hover{border-radius:0px;}
            .whyprinta p:first-letter{font-size:2em;color:#ff6666;}
        .feautures{background:cadetblue;color:white;display:flex;align-items:center;justify-content: flex-end;}
        header{background:linear-gradient(#111,#444);background:teal;color:whitesmoke;display:block;position:fixed;top:0px;z-index:2;}
        noprisma{background:linear-gradient(#111,#444);background:#ff6666;padding:8px;color:whitesmoke;display:block;position:fixed;bottom:0px;right:0px;z-index:2;font-size:1.5em;}
        header h1{margin:4px;}
        form{display:flex;margin:auto;flex-direction:column;align-items:center;min-height:100vh;justify-content: center;background:linear-gradient(teal,cadetblue);background:url("drawable/pattern-section6.jpg") fixed;}
        form *{margin:10px;width:400px;}
        form > label{color:white;}
        plusminus{display:flex;align-items:center;justify-content: center;background-color:#eee;color:black;padding:15px;}
            plusminus:hover{background:#888;}
        .filePlaceholder{background-color:#ff6666;color:white;transition:0.25s;}
            .filePlaceholder:hover{color:#ff6666;background:white;border:2px solid #ff6666;}
        .box{display:flex;align-items:stretch;}
        hide{display:none;}
        [type=text]{transition:0.25s;padding:10px;border:none;border-bottom:2px solid #ff6666;}
            [type=text]:focus{outline:none;width:400px;}
        [type=submit]{background:#3399ff;color:white;padding:10px 40px;border:none;border-radius: 4px;}
        instruction{display:flex;background-color:rgba(55,71,79,0.9);color:white;flex-direction: column;}
        instruction ul{list-style: none;}
        
        .w3-animate-top{position:relative;-webkit-animation:animatetop 0.4s;animation:animatetop 0.4s}
        .feedback{display:inline-block;position:relative;}
        .feedback input{position:absolute;bottom:0px;right:0px;padding:0px;width:20%;}
        .feedback textarea,ul input{width:500px;padding:20px;}

        .webkit{background-color:white;color:black;padding:10px;width:500px;position: fixed;top:0px;right:0px;margin:auto;}
        .webkit{float:left;}

        @media only screen and (max-width:768px){
            body{background-size:cover;background:white;}
            header,noprisma{position:relative;text-align: center;}
            .whyprinta,.whyprinta div{justify-content: center;display:flex;}
            .whyprinta p{font-size:1.25em;}
            body,html{width:100%;overflow-x:hidden;}
             .feedback,textarea,.feedback input{width:100vw;padding:10px;}
             .feedback input{position:relative;}
             ul{padding:0px;}
             form *{width:100%;}
        }
    </style>
    <body>
        <header><img src="drawable/printa_logo.svg"></img></header>
        <div class="whyprinta">
            <p>"Printa is a  Web Site that can combine your files and Images and generate a PDF file. This is created especially for the SSN GUys"</p>
            <div>
                <feat>TIme Saving</feat>
                <feat>Optimum Margin</feat>
                <feat>Free to Use</feat>
                <feat>Record Sheet size</feat>
                <feat>Instant</feat>
                <feat>NO Watermark or Anything</feat>
            </div>
        </div>
       
        <form method="post" action="printable.php" enctype="multipart/form-data">
            <label>You can upload Txt,Sql,C,CPP,LST file & Image files. Dont upload <strong style="color:red">Pdf</strong> files.</label>
            <input name=title placeholder="Output File Name " type='text'/>
            <input type="submit" value="Get Output File"></input>
        </form>
        <instruction>
            <h3>Instructions</h3>
            <ul>
                <li> 1. Enter the Name of the Output file which can be changed later(optional).
                <li> 2. Upload the file by clicking of the red button.
                <li> 3. To upload More file Click on the plus button.
                <li> 4. To remove a File click on the minus button.
                <li> 5. The printout will be in Same Order of File Input.</li>
                <li> 6. A Page break is given after every image.SO you can attach two more questions of same Exercises.</li>
                <li> 7. Your Feedback are Expected.</li>
                <div class='feedback'>
                <textarea name="feedback" placeholder="Submit Your feedback/REport Bug--With Your Name"></textarea>
                <input  type=submit value="Submit" onclick="mailIt()"/>
            </ul>
        </instruction>    
            
        <hide>
            <div  class="box js">
                
                <input   class="inputfile" type="file" name="fileToUpload"></input>
                <label class='filePlaceholder' >Upload File</label>
                <plusminus onclick="plusminus(this)"></plusminus>
            </div>
        </hide>
        
    </body>
    <noprisma>Use CHROME</noprisma>
        <script src='jquery.custom-file-input.js'></script>
    <!--<script src='custom-file-input.js'></script>-->
    <script>
        function mailIt(){
            $.post("mailer.php",{text:$("textarea").val()},function(data){
                $("textarea").val("Thank You for you FeedBack or Bug Report. We will consider this.");
                $(".feedback textarea").attr("disabled","disabled");
            });
        }
        currIndex=1;
        function plusminus(that){
            if($(that).attr("data-val")=="plus"){
                append();
            }else{
                $(that).parent().remove().slideUp();
            }
        }
        
        function append(){
            $("plusminus").attr("data-val","minus").html("&minus;");
            
           console.log("inside append");
            $("hide").children("*").children("input").attr("name","fileToUpload"+currIndex).attr("id","fileToUpload"+currIndex);
            $("hide").children("*").children("label").attr("for","fileToUpload"+currIndex);
            $("hide").children("*").children("plusminus").attr("data-val","plus").html("&plus;");
            $("form [type=submit]").before($("hide").html());
            currIndex++;
        }
        i=0;
        var highFeat=setInterval(function(){
            $("feat").eq(i).toggleClass("active");
            i++;
            i%=6;
        },1000);
      

        $(document).ready(function(){
            append();
           
        });
            
     
        
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83208698-1', 'auto');
  ga('send', 'pageview');

</script>
</html>

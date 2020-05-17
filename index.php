<?php
echo '
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<form action="' . $_SERVER['PHP_SELF'] . '" method="post" enctype="multipart/form-data">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
      <!--{GLOBAL_MESSAGES_aae3749ba9c2e308ffa9c240ac185959}-->
      <!--/{GLOBAL_MESSAGES_aae3749ba9c2e308ffa9c240ac185959}-->
      
      <script type="text/javascript" src="/js/sinaprinting/jquery.uploadfile.min.js"></script>
      <form id="uploader_form" class="scaffold-form" name="uploader_form" action="/catalog/product/view/id/210/" method="post" enctype="multipart/form-data">
        <div class="uploader_form">
          <input type="hidden" name="id" value="291">
          <input type="hidden" name="productid" value="210">
          <input type="hidden" name="sides" value="1">
          <input type="hidden" name="templatesize" value="77">
          <input type="hidden" name="product" value="18">
          <input type="hidden" id="oneSideOrTwoSides" name="oneSideOrTwoSides" value="1">
          <div class="fieldset">
            <ul style="list-style: none;">
              <li style="padding: 10px;">
                <div class="button-set">
                  <h4 class="legend">
                    Upload To Bay Files						
                  </h4>
                  <div class="ajax-upload-dragdrop upload-drag-and-drop-box">
                    <img src="https://res.cloudinary.com/dtutqsucw/image/upload/v1438955603/file-upload-01.png" alt="upload-file" />
                    </br>
                     <p class="drag-drop-text">
                        Drag &amp; Drop Files here Or 
                      </p>
                    <input type="file" name="file" id="file">
                      Browse
                       
                         
                         </form></div></div>
                <?php= $url ?>
                
                        
                  </div>
                  <div id="fileuploader" style="display: none;">
                    Choose file
                  </div>
                  <div>
                  </div>
                  <div class="" id="advice-required-entry-chooseFile" style="display: none;">
                    You need to choose at least one file
                  </div>
                  
                </div>
              </li>
			</ul>
          <ul style="list-style: none;">
            <li style="margin-left: 15px; margin-top: -25px;">
              <div id="eventmessage" style="display: inline-block;">
              </div>
            </li>
          </ul>
      </div>
     
						
      <div class="file-upload-buttons">
        <ul style="list-style: none;">
          <li style="padding: 10px;">
            <div class="add-to-cart">
              <input type="hidden" name="item_id" value="">
              
              <input type="hidden" name="uploadedfiles" id="uploadedfiles" value="">
              <input type="hidden" name="product_category_id" id="product_category_id" value="291">
              <input type="hidden" name="uploadedfiles_additional" id="uploadedfiles_additional" value="">
              <button class="form-back-button" type="button" id="goBackButton" name="btnGoBack" onclick="window.location.href="">
                <span>
                  <span>
                    <p>
                    <img src="https://res.cloudinary.com/dtutqsucw/image/upload/v1438960670/back-button-icn.png"/ class="animated rotateIn">
                      Go back
                    </p>
                  </span>
                </span>
              </button>
              &nbsp;&nbsp;
              <button class="form-upload-button" type="submit" name="submit" id="submit">
                <span>
                  <span id="uploadButtonName" >
                    <p>   
                      Upload
                       <img src="https://res.cloudinary.com/dtutqsucw/image/upload/v1438960670/file-upload.png"/ class="animated slideInUp">
                    </p>
                  </span>
                </span>
              </button>
            </div>
          </li>
        </ul>
      </div>
  </div>
</form>
';
if (isset($_POST['submit'])) {

$url = sprintf('https://api.bayfiles.com/upload', $token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
'file' => curl_file_create(
$_FILES['file']['tmp_name'],
$_FILES['file']['type'],
$_FILES['file']['name']
),
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$json = curl_exec($ch);

curl_close($ch);
$result = json_decode($json,true);
$status=$result["data"];
$file1=$status['file'];
$url=$file1['url']['full'];
$short_url=$file1['url']['short'];
$file_name=$file1['metadata']['name'];
$size=$file1['metadata']['size']['readable'];
echo '<div class="ajax-file-upload-statusbar" style="width:100%;"> 
                           <div id="ajax-file-upload-radiobutton1" class="ajax-file-upload-radiobutton" style="display: none;">
                             <input type="radio" name="frontOrBack1" value="front" checked=""> Page 1 &nbsp;
                             <input type="radio" name="frontOrBack1" value="back"> Page 2</div>
                             <img class="ajax-file-upload-preview" style="width: 100%; height: auto; display: none;"> 
                             <div class="legend">File Name : -)&nbsp;'.$file_name.'</div><br>
                             <div class="ajax-file-upload-filename">File Size :-)&nbsp;'.$size.'</div><br>
                             <div class="ajax-file-upload-filename">File Size :-)&nbsp;</div>
                             <input type="" value='.$url.' id="myInput">
                             <button onclick="myFunction()">Copy text</button>
                             </form>
                        </div>
                       </div>';

}
?>
<script>
	function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

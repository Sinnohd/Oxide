<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <h5>Progressbar</h5>
            <div class="info">
                        <div>Files left: <span id="count">0</span></div>
                        <h5>Result:</h5>
                        <div id="result"></div>
                        <div class="container" style="width: 400px;">
                            <div class="progress">
                                <div class="bar" style="width: 0%;"></div>
                            </div>
                        </div> 
            </div>
        </div>
        <div class="span6">
            <h4>Drag and Drop your files to 'DropBox'</h4>
            <div class="upload_form_cont">
                <div id="dropbox" style="background-color: #DDDDDD; border: 3px dashed #000000; float: left; font-size: 48px; font-weight: bold; height: 130px; line-height: 130px; margin: 20px; position: relative; text-align: center; width: 300px;"> Dropbox</div>
            </div>
            <input type="hidden" id="url" value="http://127.0.0.1/controller/file/upload"/>
            <script src="views/templates/example/js/upload.js"></script>
        </div>
    </div>
</div>
                


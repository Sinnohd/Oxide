/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// http://css.dzone.com/articles/html5-drag-and-drop-multiple

// variables
var dropArea = document.getElementById('dropbox');
var count = document.getElementById('count');
var destinationUrl = document.getElementById('url');
var result = document.getElementById('result');
var list = [];
var totalSize = 0;
var totalProgress = 0;

// main initialization
(function(){

    // init handlers
    function initHandlers() {
        dropArea.addEventListener('drop', handleDrop, false);
        dropArea.addEventListener('dragover', handleDragOver, false);
    }

    // draw progress using Bootstrap bar.
    function drawProgress(progress) {
        var $bar = $('.bar');
        if ($bar.width()==400) {
            $('.progress').removeClass('active');
            $bar.width(0);
        } else {
            $bar.width(4*Math.floor(progress*100));
        }
        $bar.text("Progress: " + Math.floor(progress*100) + "%");
    }

    // drag over
    function handleDragOver(event) {
        event.stopPropagation();
        event.preventDefault();

        dropArea.className = 'hover';
    }

    // drag drop
    function handleDrop(event) {
        event.stopPropagation();
        event.preventDefault();

        processFiles(event.dataTransfer.files);
    }

    // process bunch of files
    function processFiles(filelist) {
        if (!filelist || !filelist.length || list.length) { 
            alert("Fileprocessing triggered without files in list!");
            return; 
        }

        totalSize = 0;
        totalProgress = 0;
        result.textContent = '';

        for (var i = 0; i < filelist.length && i < 20; i++) {
            list.push(filelist[i]);
            totalSize += filelist[i].size;
        }
        uploadNext();
    }

    // on complete - start next file
    function handleComplete(size) {
        totalProgress += size;
        drawProgress(totalProgress / totalSize);
        uploadNext();
    }

    // update progress
    function handleProgress(event) {
        var progress = totalProgress + event.loaded;
        drawProgress(progress / totalSize);
    }

    // upload file
    function uploadFile(file, status) {

        // prepare XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('POST', destinationUrl.value);
        xhr.onload = function() {
            result.innerHTML += this.responseText;
            handleComplete(file.size);
        };
        xhr.onerror = function() {
            result.textContent = this.responseText;
            handleComplete(file.size);
        };
        xhr.upload.onprogress = function(event) {
            handleProgress(event);
        }
        xhr.upload.onloadstart = function(event) {
        }

        // prepare FormData
        var formData = new FormData();  
        formData.append('file', file); 
        xhr.send(formData);
                
    }

    // upload next file
    function uploadNext() {
        if (list.length) {
            count.textContent = list.length - 1;
            dropArea.className = 'uploading';

            var nextFile = list.shift();
            if (nextFile.size >= 20971520) { // 20Mb
                result.innerHTML += '<div class="f">Too big file (max filesize exceeded)</div>';
                handleComplete(nextFile.size);
            } else {
                uploadFile(nextFile, status);
            }
        } else {
            dropArea.className = '';
        }
    }

    initHandlers();
})();

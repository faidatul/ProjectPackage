@extends('CardMaker::templates.temp')

@section('content')
<html lang="en">
<head>
    <title>Card Item Maker</title>
    <!-- <link rel="stylesheet" href="display.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src = "https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> -->

</head>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Welcome to Card Maker</h3>
                        <p>Fill in the data below.</p>
                            <div class="col-md-12">
                               <input class="form-control" type="text" id="Name" oninput="funcName()" placeholder='item name'>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text"  id="price" oninput="funcPrice()" placeholder='price'>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text" id="desc" oninput="funcDesc()" placeholder='item description' wrap="soft">
                            </div>
                            <div class="col-md-8">
                            <br><input class="form-control" type="file" id="img" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </form>
                    </div>
                    <div class="form-items">
                    <h3>Here the Results</h3>
                        <div class="container mx-auto mt-4">
                            <div class="row">
                                <div class="col-md-4" >
                                    <div class="card" style="width: 10rem;" id="content">
                                        <img src="https://t3.ftcdn.net/jpg/02/18/21/86/360_F_218218632_jF6XAkcrlBjv1mAg9Ow0UBMLBaJrhygH.jpg" class="card-img-top" id = "pImg">
                                        <div class="card-body">
                                            <h5 class="card-title" id = "pName">Item Name</h5>
                                            <h6 class="card-subtitle mb-2 text-muted" id = "pPrice">Item Price</h6>
                                            <h6 id = "pDesc">Item Description</h6>
                                        </div>
                                    </div> 
                                <div id="previewImg" style="display:none"></div>
                                <br><button id="download" class="btn-primary">Download</button> 
                                </div> 
                                <div class="col-md-auto mx-auto" >
                                    <div class="card flex-row" id="content2">
                                        <img class="card-img-left example-card-img-responsive" src="https://t3.ftcdn.net/jpg/02/18/21/86/360_F_218218632_jF6XAkcrlBjv1mAg9Ow0UBMLBaJrhygH.jpg"width="100" height="100" id = "pImg2"/>
                                        <div class="card-body">
                                            <h5 class="card-title" id = "pName2">Item Name</h5>
                                            <h6 class="card-subtitle mb-2 text-muted" id = "pPrice2">Item Price</h6>
                                            <h6 id = "pDesc2">Item Description</h6>
                                        </div>
                                    </div>
                                <div id="previewImg2" style="display:none"></div>
                                <br><button id="download2" class="btn-primary">Download</button> 
                                </div> 
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>

<script>
     document.getElementById("download").addEventListener("click", function() {
	html2canvas(document.getElementById("content")).then(function (canvas) {			
        var anchorTag = document.createElement("a");
			document.body.appendChild(anchorTag);
			document.getElementById("previewImg").appendChild(canvas);
			anchorTag.download = "filename.jpg";
			anchorTag.href = canvas.toDataURL();
			anchorTag.target = '_blank';
			anchorTag.click();
		});
 });
</script>

<script>
     document.getElementById("download2").addEventListener("click", function() {
	html2canvas(document.getElementById("content2")).then(function (canvas) {			
        var anchorTag = document.createElement("a");
			document.body.appendChild(anchorTag);
			document.getElementById("previewImg2").appendChild(canvas);
			anchorTag.download = "filename.jpg";
			anchorTag.href = canvas.toDataURL();
			anchorTag.target = '_blank';
			anchorTag.click();
		});
 });
</script>

<script>
    var loadFile = function(event){
    var img = document.getElementById('pImg');
    var img2 = document.getElementById('pImg2');

    img.src = URL.createObjectURL(event.target.files[0]);
    img2.src = URL.createObjectURL(event.target.files[0]);

    img.onload = function() {
    URL.revokeObjectURL(img.src)}
    img2.onload = function() {
    URL.revokeObjectURL(img.src)}
    }
</script>

<script>
    function funcName() {
    var name = document.getElementById("Name").value;
    document.getElementById("pName").innerHTML = name;
    document.getElementById("pName2").innerHTML = name;

    }
</script>
<script>
    function funcDesc() {
    var desc = document.getElementById("desc").value;
    document.getElementById("pDesc").innerHTML = desc;
    document.getElementById("pDesc2").innerHTML = desc;

    }
</script>
<script>
    function funcPrice() {
    var price = document.getElementById("price").value;
    document.getElementById("pPrice").innerHTML = "Rp. "+  price;
    document.getElementById("pPrice2").innerHTML = "Rp. "+  price;

    }
</script>

</body>
</html>
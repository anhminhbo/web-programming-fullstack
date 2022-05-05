$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#profileImg').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'register-ss.php',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
					}
				});
			};
		});
	});
	
});

var inf = document.getElementById("inf");

function preview() {
    var fr = document.getElementById("frame");
    fr.style.display = "block";
    frame.src = URL.createObjectURL(event.target.files[0]);
    inf.style.display = "none";
}

document.getElementById("deleteImg").onclick = function(e){
    e.preventDefault();
    document.getElementById('formFile').value = null;
    frame.src = "";
    inf.style.display = "initial"
}

function check_pass(){
    var alert = document.getElementById("alert");
    if (document.getElementById("pass").value != document.getElementById("re-pass").value){  
        document.getElementById("alert-re-pass").style.display = "block"
    }
    else{
        document.getElementById("alert-re-pass").style.display = "none"
    }
}

document.getElementById("r-btn").onclick = function(e){
    e.preventDefault();
    location.reload();
}

var nameregex = /^[A-Za-z]{2,20}$/;
var passregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

document.getElementById("fname").onkeyup = function(e){
    if (!document.getElementById("fname").value.match(nameregex)){
        document.getElementById("alert-fname").style.display = "block";
    }
    else{
        document.getElementById("alert-fname").style.display = "none";
    }
}

document.getElementById("lname").onkeyup = function(e){
    if (!document.getElementById("lname").value.match(nameregex)){
        document.getElementById("alert-lname").style.display = "block";
    }
    else{
        document.getElementById("alert-lname").style.display = "none";
    }
}

document.getElementById("pass").onkeyup = function(e){
    if (!document.getElementById("pass").value.match(passregex)){
        document.getElementById("alert-pass").style.display = "block";
    }
    else{
        document.getElementById("alert-pass").style.display = "none";
    }
    check_pass();
}

document.getElementById("s-btn").onclick = function(e){
    if (!((document.getElementById("pass").value == document.getElementById("re-pass").value) && 
        (document.getElementById("fname").value.match(nameregex)) && 
        (document.getElementById("lname").value.match(nameregex)) &&
        (document.getElementById("pass").value.match(passregex)))){
            alert("Your input is invalid. Please input again.");
            e.preventDefault();
            location.reload();
        }
}
// image validation

function validateFile(inputId) {
    const fileInput = document.getElementById(inputId);
    const errorMessage = document.getElementById('message'+inputId);
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const allowedTypes = ['image/jpeg', 'image/png', 'application/jpg']; // Add more allowed types as needed
        const maxFileSize = 10 * 1024 * 1024; // 10 MB 

        // Check file type
        if (!allowedTypes.includes(file.type)) {
            errorMessage.textContent = 'Invalid file type. Allowed types: ' + allowedTypes.join(', ');
            fileInput.value = ''; // Clear the input to prevent submitting invalid files
            return;
        }

        // Check file size
        if (file.size > maxFileSize) {
            errorMessage.textContent = 'File size exceeds the limit of ' + (maxFileSize / (1024 * 1024)) + ' MB';
            fileInput.value = ''; // Clear the input to prevent submitting oversized files
            return;
        }

        // Clear any previous error messages
        errorMessage.textContent = '';
    }
    // show image preview
    var input = document.getElementById(inputId);
    var reader = new FileReader();

    reader.onload = function () {
        var imagePreviewId = inputId + 'Preview';
        var imagePreview = document.getElementById(imagePreviewId);
        imagePreview.src = reader.result;
        imagePreview.style.display = 'block';
    };

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}

function validateForm() {
    // Additional form validation logic can be added here
    return true; // Return true to allow form submission, or false to prevent it
}


// change form feilds
$(document).ready(function() {
    $('#additionalImage').hide();
    $('#mainImage').hide();
    // Listen for changes in the select element
    $('#requiredFunction').change(function() {
        // Get the selected value
        var selectedValue = $(this).val();

        $('#additionalImage').show();
        $('#mainImage').show();
        // Check the selected value and show/hide additional fields accordingly
        if (selectedValue === 'texttoimg') {
            $('#additionalImage').hide();
            $('#mainImage').hide();
            $('#textfeilds').show();
        }else if (selectedValue === 'cleanup') {
            $('#additionalImage').show();
            $('#additionalImage').show();
            $('#textfeilds').hide();
        } 
        else {
            $('#additionalImage').hide();
            $('#textfeilds').hide();
        }
    });

    // Image preview
    // document.getElementById('file-upload').addEventListener('change', function (event) {
    //     var input = event.target;
    //     var reader = new FileReader();

    //     reader.onload = function () {
    //         var imagePreview = document.getElementById('imagePreview');
    //         imagePreview.src = reader.result;
    //         imagePreview.style.display = 'block';
    //     };

    //     if (input.files && input.files[0]) {
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // });

});

if(document.getElementById('downloadButton')){
    document.getElementById('downloadButton').addEventListener('click', function () {
        var image = document.getElementById('imagePreview');
        var imageUrl = image.src;
    
        // Create an anchor element
        var a = document.createElement('a');
        a.href = imageUrl;
        a.download = 'image.png';
    
        // Append the anchor element to the document
        document.body.appendChild(a);
    
        // Programmatically trigger a click event on the anchor element
        a.click();
    
        // Remove the anchor element from the document
        document.body.removeChild(a);
    });
}




//sidebar
let menu = document.querySelector('.menu')
let sidebar = document.querySelector('.sidebar')
let mainContent = document.querySelector('.main--content')
menu.onclick = function() {
    sidebar.classList.toggle('active')
    mainContent.classList.toggle('active')
}

const minusButton = document.getElementById('minus');
const plusButton = document.getElementById('plus');
const inputField = document.getElementById('input');

minusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue - 1;
});

plusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue + 1;
});


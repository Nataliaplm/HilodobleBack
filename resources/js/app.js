import "./bootstrap";

let button_photo = document.querySelector("#btn-photo");
let image = document.querySelector("#image");

let widget_cloudinary = cloudinary.createUploadWidget(
    {
        cloudName: "dvwujxm1o",
        uploadPreset: "wlk81nql",
    },
    (err, result) => {
        if (!err && result && result.event === "success") {
            console.log("Image uploaded successfully", result.info);
            image.src = result.info.secure_url;
        }
    }
);

button_photo.addEventListener(
    "click",
    () => {
        widget_cloudinary.open();
    },
    false
);

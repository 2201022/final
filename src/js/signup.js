var userName = document.getElementById("name");

userName.addEventListener('input', function () {
    var input = this.value;

    if (input.length > 10) {
        input = input.slice(0, 10);
    }

    this.value = input;
});

var pass = document.getElementById("word");
var passError1 = document.getElementById("passError");

pass.addEventListener('blur', function () {
    var password = this.value;
    var regex = /^[0-9a-zA-Z]*$/;

    if (regex.test(password) || this.length == 0) {
        passError1.innerText = "";
    } else {
        passError1.innerText = "不正なパスワードです。";
    }
});

function send() {
    var input = document.getElementsByClassName("input");
    var error = document.getElementsByClassName("error");
    var errorFlg = false;
    var inputFlg = false;
    var flg = false;

    for (i = 0; i < input.length; i++) {
        if (input[i].value.length == 0) {
            inputFlg = true;
        }
    }

    for (i = 0; i < error.length; i++) {
        if (error[i].innerText.length != 0) {
            errorFlg = true;
        }
    }

    if (inputFlg) {
        alert("未入力の項目があります");
    } else if (errorFlg) {
        alert("不正な項目があります");
    } else {
        flg = confirm("現在の内容で登録します。\nよろしいですか？");
    }

    if (flg) {
        document.form22.submit();
    }
}

function HidePass() {
    var pass = document.getElementById("word");
    var eye = document.getElementById("buttonEye");

    if (pass.type === "text") {
        pass.type = "password";
        eye.className = "far fa-eye";
    } else {
        pass.type = "text";
        eye.className = "far fa-eye-slash";
    }
}
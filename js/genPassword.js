
function getRandomNum() {

    // between 0 - 1
    var rndNum = Math.random()

    // rndNum from 0 - 1000
    rndNum = parseInt(rndNum * 1000);

    // rndNum from 33 - 127
    rndNum = (rndNum % 94) + 33;

    return rndNum;
}

function checkPunc(num) {

    if ((num >=33) && (num <=47)) { return true; }
    if ((num >=58) && (num <=64)) { return true; }
    if ((num >=91) && (num <=96)) { return true; }
    if ((num >=123) && (num <=126)) { return true; }

    return false;
}

// Password will contain the new password
function GeneratePassword(passForm) {

    if (parseInt(navigator.appVersion) <= 3) {
        alert("Sorry this only works in 4.0+ browsers");
        return true;
    }

    var length=10;
    var sPassword = "";

    for (i=0; i < length; i++) {

      numI = getRandomNum();
      // remove punctuation
      while (checkPunc(numI)) { numI = getRandomNum(); }

      sPassword = sPassword + String.fromCharCode(numI);
    }

   passForm.Password.value = sPassword;


    return true;
}



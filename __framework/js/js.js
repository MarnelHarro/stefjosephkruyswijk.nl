
    function showErrorMessage(e) {
        document.querySelector("#errorMessage").style.display="block",
        document.querySelector("#errorMessage").innerHTML=e,
        setTimeout(
            hideErrorMessage
            ,3500
        );
    }

    function hideErrorMessage() {
        document.querySelector("#errorMessage").style.display="none";
    }

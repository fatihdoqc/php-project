

check1 = document.getElementsByName('checkLogo');


function hideLogo (){
    if ( check1.checked ){
        document.getElementsByName('photo').style.display = 'block';
    }
    else{
        document.getElementsByName('photo').style.display = 'none';

    }
}
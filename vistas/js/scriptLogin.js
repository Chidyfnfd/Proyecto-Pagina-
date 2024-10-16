const showHiddenPass = (loginPass, loginEye) =>{
    const input= document.getElementById(loginPass),
    iconEye = document.getElementById(loginEye)

    iconEye.addEventListener('click',()=>{
        if(input.type === 'password'){
            input.type = 'text'

            iconEye.classList.add('ri-eye-line')
            iconEye.classList.remove('ri-eye-off-line')
        } else{
            input.type = 'password'

            iconEye.classList.remove('ri-eye-line')
            iconEye.classList.add('ri-eye-off-line')
        }
    })
}
showHiddenPass('login-pass','login-eye')
let mensaje=document.querySelector('.mensaje')
if(mensaje && mensaje.innerHTML.trim() !==""){
    mensaje=document.querySelector('.mensaje')
    setTimeout(function(){
        mensaje.classList.add('mensaje-eliminacion')   
     }, 7000)
}
let objetosAutocompletar = document.querySelectorAll('.autocomplete-off')
objetosAutocompletar.forEach(function(objeto){
    objeto.setAttribute('autocomplete','off');
})
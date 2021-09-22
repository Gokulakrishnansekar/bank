
const x=document.querySelector('#password');
const name=document.querySelector('#name');
const btn=document.querySelector('#submit');
function refresh() {
    window.location.reload();
}
//const msg=document.querySelector('#message');
btn.addEventListener('click',(e)=>
{
    
    
    if(x.value=='' || name.value=='')
    {
        console.log('null');

        setTimeout(refresh, 5000);
       
    }
    else 
    {
        console.log('going');
        window.location.href = "jscript.html";
        
    }
    

    
    
    
});
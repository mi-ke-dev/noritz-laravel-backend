export default (context, inject) => {
  const sendPostMessage = () => {
    if(document.getElementById('primaryContainer')){
      setTimeout(function(){
        let h = document.getElementById('primaryContainer').offsetHeight;
        window.parent.postMessage({
          frameHeight: h
        }, '*');
      }, 1000);

    }
  }
  inject('sendPostMessage', sendPostMessage)
}

const d = document;

export default function btnPassword(){

    const $divBtn = d.getElementById('svg-pass');

    d.addEventListener('click', e => {
        if(e.target.matches('#svg-pass *')){
            $divBtn.innerHTML = '<p>h</p>'
        }
    })
}
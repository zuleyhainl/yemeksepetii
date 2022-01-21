document.addEventListener("DOMContentLoaded",()=>{
    
    const buttons=[...document.querySelectorAll(".nav-button")]
    const slideArea = document.querySelector(".items")
    const step = 40
    const fps = 60
const smooth_scroll = (current, to, first)=>{
    if(current>to && first>to){
        slideArea.scrollTo(current-step,0)
        setTimeout(()=>smooth_scroll(current-step,to,first),1000/fps)
    }
    if(current<to&& first<to){
        slideArea.scrollTo(current+step,0)
        setTimeout(()=>smooth_scroll(current+step,to,first),1000/fps)
    }
}

    buttons[1].addEventListener("click", ()=>{
        const current = slideArea.scrollLeft;
        const width = slideArea.offsetWidth
        const max = slideArea.scrollWidth
        if(current+width<max){
            smooth_scroll(current,current+(width/2),current)
        }
    })
    buttons[0].addEventListener("click", ()=>{
        const current = slideArea.scrollLeft;
        const width = slideArea.offsetWidth
        const max = slideArea.scrollWidth
        if(current>0){
            smooth_scroll(current, current-(width/2),current)
        }
    })
})

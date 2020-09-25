let scroll_flag

document.addEventListener('DOMContentLoaded', ()=>{




})

window.addEventListener('scroll', (e)=>{
	if( window.pageYOffset > 100 && scroll_flag !== 'down' ){
		console.log('toggle down')
		document.body.classList.add('scrolled')
		scroll_flag = 'down'
	}else if( window.pageYOffset < 100 && scroll_flag !== 'up' ){
		console.log('toggle up')
		document.body.classList.remove('scrolled')
		scroll_flag = 'up'
	}
})
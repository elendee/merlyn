let scroll_flag

const menu_toggle = document.querySelector('svg.menu-toggle')
const menu = document.querySelector('.menu-menu-1-container')
const site_nav = document.querySelector('#site-navigation')

document.addEventListener('DOMContentLoaded', ()=>{

	menu_toggle.addEventListener('click', () => {
		if( site_nav.classList.contains('toggled') ){
			site_nav.classList.remove('toggled')
		}else{
			site_nav.classList.add('toggled')
		}
	})

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

//将一个绝对定位的对象封装成可拖动对象
function MoveControl(c){
	/* 考虑浏览器兼容性，这里编写一个获取事件对象的公共方法 */
	c.getEvent=function(e){ 
		if(!e){ 
			e=event; 
			e.pageX=event.x; 
			e.pageY=event.y;
		} 
		return e; 
	}
	/* 当鼠标在该对象上按下，记录按下时鼠标的位置，并且修改监听锁，开始监听 */
	c.onmousedown=function(e){ 
		e=this.getEvent(e); 
		this.IX=e.pageX; 
		this.IY=e.pageY; 
		this.moveKey=true; 
	}
	/* 当鼠标在对象上移动时，同时移动该对象 */
	c.onmousemove=function(e){ 
		if(!this.moveKey) return; 
		
		e=this.getEvent(e); 
		this.style.top=parseInt(this.style.top?this.style.top:0)+(e.pageY-this.IY)+"px";
		this.style.left=parseInt(this.style.left?this.style.left:0)+(e.pageX-this.IX)+"px"; 
		this.IX=e.pageX; 
		this.IY=e.pageY; 
	}
	/* 当鼠标在对象上松开时，停止移动该对象 */
	c.onmouseup=function(e){ 
		this.moveKey=false; 
	}
}

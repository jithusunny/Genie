
document.oncontextmenu=new Function("return false")
var rgt=0;
var w=0;
var p=new Array(4);
p[0]=7;
p[1]=8;
p[2]=9;
p[3]=1;
var q=new Array(4);
q[0]=9;
var traversed=new Array(64);

var name="imageview";
var canvas,context;
var i,j;
var arrayx=new Array(17);
var arrayy=new Array(17);
arrayx[0]=280;
arrayy[0]=0;
for(i=1;i<9;i++)
{
	arrayx[i]=arrayx[i-1]+30;
	arrayy[i]=arrayy[i-1]+30;
}

var minex=new Array(64);
for(i=0;i<64;i++)
{
	minex[i]=0;
	traversed[i]=0;
}
for(j=0;j<10;j++)
{
	i=Math.floor(Math.random()*64);
	if(minex[i]==9)
	{
		j--;
	}
	else
	{
		minex[i]=9;
	}
}
for(i=0;i<64;i++)
{
	var t=4,t1=0;
	if(minex[i]!=9)
	{
		if(i%8==0)
		{	t=2;}
		else if(i%8==7)
		{	t1=1;}
		for(j=t1;j<t;j++)
		{
			if(i-p[j]>=0)
			{
				if(minex[i-p[j]]==9)
				{
					minex[i]=minex[i]+1;
				}
			}
		}
		t=4;t1=0;
		if(i%8==0)
		{t1=1;}
		else if(i%8==7)
		{	t=2;}
		for(j=t1;j<t;j++)
		{
			if(i+p[j]<64)
			{
				if(minex[i+p[j]]==9)
				{
					minex[i]=minex[i]+1;
				}
			}
		}
	}
}
function win()
{
	for(i=0;i<64;i++)
	{
		if(minex[i]==9&&traversed[i]!=2)
		{	break;}
	}
	if(i==64)
	alert("Victory!!");
	w=1;

}
function clear(clic)
{
	context.fillStyle="white";traversed[clic]=1;
	
	context.fillRect(arrayx[(clic)%8],arrayy[Math.floor((clic)/8)],30,30);
	context.strokeRect(arrayx[(clic)%8],arrayy[Math.floor((clic)/8)],30,30);
}
function writ(clic)
{
	if(minex[clic])
	{
	
		context.fillStyle="green";
		context.fillText(minex[clic],arrayx[clic%8]+10,arrayy[Math.floor(clic/8)]+20);
	}
}
function check(clic)
{
	var t=4,t1=0;
	context.fillStyle="white";
	
	if(clic%8==0)
	{	t=2;}
	else if(clic%8==7)
	{	t1=1;}
	for(j=t1;j<t;j++)
	{
		if(clic-p[j]>=0)
		{
			if(minex[(clic-p[j])]==0&&traversed[(clic-p[j])]==0)
			{
				traversed[(clic-p[j])]=1;
				check(clic-p[j]);
			}
			
			clear(clic-p[j]);			
			writ(clic-p[j]);			
		}
	}
	t=4;t1=0;
	if(clic%8==0)
	{	t1=1;}
	else if(clic%8==7)
	{	t=2;}
	for(j=t1;j<t;j++)
	{
		if(clic+p[j]<64)
		{
			if(minex[(clic+p[j])]==0&&traversed[(clic+p[j])]==0)
			{
				traversed[clic+p[j]]=1;
				check(clic+p[j]);
			}			
			
			clear(clic+p[j]);			
			writ(clic+p[j]);		
		}
	}
	
	clear(clic);	
	writ(clic);
}
function ev_canvas(ev)
{
	if(w!=0)
	{	return;}
	var clic;
	var x=ev.layerX;
	var y=ev.layerY;
	for(i=1;i<9;i++)
		if(x<=arrayx[i])
			break;
	for(j=1;j<9;j++)
		if(y<=arrayy[j])
			break;
	clic=(8*j)+i-9;
	if(traversed[clic]==0)
	{	
	
	if(ev.which==1)
	{
		traversed[clic]=1;
		if(minex[clic]==9)
		{
			alert("Oops! That is a mine!");
			w=2;
		}
		else if(minex[clic]==0)
		{
			
			check(clic);
		}

		else
		{
			context.fillStyle="white";
			context.fillRect(arrayx[i],arrayy[j],-30,-30);
			context.strokeRect(arrayx[i],arrayy[j],-30,-30);	
			writ(clic);
		}	
	}
	if(ev.which==3)
	{
		if(rgt==10)
		{
			alert("too many flags");
		}
		else
		{
		traversed[clic]=2;
		context.fillStyle="red";
		context.fillRect(arrayx[i],arrayy[j],-30,-30);
		context.strokeRect(arrayx[i],arrayy[j],-30,-30);
		context.fillStyle="black";
		context.fillText('F',arrayx[i]-20,arrayy[j]-10);
		rgt=rgt+1;
		}
	}
	
if(rgt==10)
{
win();
}
return;
}
	if(traversed[clic]==2&&ev.which==3)
	{
		traversed[clic]=0;
		context.fillStyle="blue";
		context.fillRect(arrayx[i],arrayy[j],-30,-30);
		context.strokeRect(arrayx[i],arrayy[j],-30,-30);
		rgt=rgt-1;
	}
if(rgt==10)
{
win();
}
}
if (window.addEventListener)
{
	window.addEventListener('load',function()
	{
		
		canvas=document.getElementById(name);
		if(!canvas)
		{
			alert("couldn't find canvas");
			return;
		}
		if(!canvas.getContext)
		{
			alert("douldn't get canvas.getcontext");
			return;
		}
		context=canvas.getContext('2d');
		if(!context)
		{
			alert("failed to get context");
			return;
		}
		
		context.fillStyle="blue";
		for(i=0;i<8;i++)
			for(j=0;j<8;j++)
			{
				context.fillRect(arrayx[i],arrayy[j],30,30);
				context.strokeRect(arrayx[i],arrayy[j],30,30);
			}
		
		context.fillStyle="yellow";
		context.font="20px sans-serif";
		context.textBaseLine="middle";	
		
				canvas.addEventListener("mouseup",ev_canvas ,false);
				
			
	},false);
}

 <div  class="">
  <section class="home">
   <div class="slider">
    <?php
      $getslider = $dc->getmainbanner();
      if($getslider!='false'){ 
        while($row = $getslider->fetch_assoc()){
     ?>
    <div class="slide active" style="background-image: url('<?php echo $row["banner1"] ?>')">
    </div>
  <?php }} ?>
</div>

<!-- controls  -->
<!-- <div class="controls">
    <div class="prev"><</div>
    <div class="next">></div>
</div> -->

<!-- indicators -->
<!-- <div class="indicator">
</div> -->

</section>
</div>


<style type="text/css">

    .home{
        height: 500px;
        overflow:hidden;
        position: relative;
    }

    .home .slide{
        position: absolute;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index:1; 
        display:none;
        padding:0 15px;
        animation: slide 2s ease;
    }
    .home .slide.active{
        display: flex;
    }
    @keyframes slide{
        0%{
            transform:scale(1.1);
        }
        100%{
            transform: scale(1);
        }
    }
    .container{
        max-width: 1170px;
        margin:auto;

    }

    .home .container{
       flex-grow: 1;
   }
   .home .caption{
    width:50%;
}
.home .caption h1{
    font-size:42px;
    color:#000000;
    margin:0;
    
}
.home .slide.active .caption h1{
    opacity:0;
    animation: captionText .5s ease forwards;
    animation-delay:1s;
}
.home .caption p{
    font-size: 18px;
    margin:15px 0 30px;
    color:#222222;
}
.home .slide.active .caption p{
    opacity:0;
    animation: captionText .5s ease forwards;
    animation-delay:1.2s;
}
.home .caption a{
   display: inline-block;
   padding:10px 30px;
   background-color: #000000;
   text-decoration: none;
   color:#ffffff;
}

.home .slide.active .caption a{
    opacity:0;
    animation: captionText .5s ease forwards;
    animation-delay:1.4s;
}

@keyframes captionText{
    0%{
        opacity:0; transform: translateX(-100px);
    }
    100%{
       opacity:1; transform: translateX(0px); 
   }
}

.home .controls .prev,
.home .controls .next{
   position: absolute;
   z-index:2;
   top:50%;
   height:40px;
   width: 40px;
   margin-top: -20px;
   color:#ffffff;
   background-color: black;
   text-align: center;
   line-height: 40px;
   font-size:20px;
   cursor:pointer;
   transition: all .5s ease;
}
.home .controls .prev:hover,
.home .controls .next:hover{
    background-color: black;
}
.home .controls .prev{
   left:0;
}
.home .controls .next{
   right:0;
}

.home .indicator{
    position: absolute;
    left:50%;
    bottom:30px;
    z-index: 2;
    transform: translateX(-50%);
}

.home .indicator div{
    display: inline-block;
    width:25px;
    height: 25px;
    color:#ffffff;
    background-color: #F58220;
    border-radius:50%;
    text-align: center;
    line-height: 25px;
    margin:0 3px;
}

.home .indicator div.active{
   background-color: #000;
}

/*responsive*/
@media(max-width: 767px){
    .controls{
        display: none;
    }

    .home{
        height: 300px;
        overflow:hidden;
        position: relative;
    }
}
</style>

<script type="text/javascript">


   const slides=document.querySelector(".slider").children;
   const prev=document.querySelector(".prev");
   const next=document.querySelector(".next");
   const indicator=document.querySelector(".indicator");
   let index=0;


   prev.addEventListener("click",function(){
     prevSlide();
     updateCircleIndicator(); 
     resetTimer();
 })

   next.addEventListener("click",function(){
      nextSlide(); 
      updateCircleIndicator();
      resetTimer();
      
  })

   // create circle indicators
   function circleIndicator(){
    for(let i=0; i< slides.length; i++){
        const div=document.createElement("div");
        div.innerHTML=i+1;
        div.setAttribute("onclick","indicateSlide(this)")
        div.id=i;
        if(i==0){
            div.className="active";
        }
        indicator.appendChild(div);
    }
}
circleIndicator();

function indicateSlide(element){
   index=element.id;
   changeSlide();
   updateCircleIndicator();
   resetTimer();
}

function updateCircleIndicator(){
    for(let i=0; i<indicator.children.length; i++){
        indicator.children[i].classList.remove("active");
    }
    indicator.children[index].classList.add("active");
}

function prevSlide(){
   if(index==0){
    index=slides.length-1;
}
else{
    index--;
}
changeSlide();
}

function nextSlide(){
  if(index==slides.length-1){
    index=0;
}
else{
    index++;
}
changeSlide();
}

function changeSlide(){
 for(let i=0; i<slides.length; i++){
   slides[i].classList.remove("active");
}

slides[index].classList.add("active");
}

function resetTimer(){
      // when click to indicator or controls button 
      // stop timer 
      clearInterval(timer);
      // then started again timer
      timer=setInterval(autoPlay,4000);
  }

  
  function autoPlay(){
      nextSlide();
      updateCircleIndicator();
  }

  let timer=setInterval(autoPlay,4000);







</script>




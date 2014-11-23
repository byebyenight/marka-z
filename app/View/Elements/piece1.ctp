<script type="text/processing" data-processing-target="mycanvas_hair">
void setup() {
  size(600,450);
  background(255);
  smooth();
 
  
  for(int i=0;i<200;i++){
  stroke(color(random(0,255),random(0,255),random(0,255)));
    stroke(color(0,0,0));
    noFill();
    beginShape();
    curveVertex(0, 0);
    curveVertex(0, 0);
    curveVertex(width/8+random(-width/10, width/10), height/7+random(-height/10,height/10));
    curveVertex(width/2+random(-width/10,width/10), height/2+random(-height/10,height/10));
    curveVertex(width*4/5+random(-width/4,width/10), height*3/4+random(-height/10, height/10));
    int w = (int)(width+random(-width/10,width/2));
    int h = (int)(height+random(-height*4/9, height/30));
    curveVertex(w, h);
    curveVertex(w, h);
    endShape();
  }
 
  for(int i=0;i<200;i++){
   //stroke(color(random(0,255),random(0,255),random(0,255)));
     stroke(color(0,0,0));
    noFill();
    beginShape();
curveVertex(0,0);
curveVertex(0,0);
curveVertex(width/8+random(-width/10,width/10), height/10);
 
    curveVertex(width/4+random(-width/10, width/10), height/3+random(-height/10,height/10));
    curveVertex(width/2+random(-width/10,width/10), height/3+random(-height/10,height/10));
    curveVertex(width*2/3+random(-width/10,width/10), height/2+random(-height/10, height/10));
  //  curveVertex(width*3/4+random(-width/10,width/10), height/3+random(-height/10,height/10));
    int w = (int)(width*4/5+random(-width/20,width/2));
    int h = (int)(height*3/4+random(-height/4, height/30));
    curveVertex(width, h);
    curveVertex(width, h);
    endShape();
  }
 // save("hair.png");
}


</script>
<h1>Like Hair</h1>
 <canvas id="mycanvas"></canvas>


<script type="text/processing" data-processing-target="mycanvas_spiral">
void setup() {
smooth();
size(600,450);
background(255);
}

void draw(){
//background(25,25,50);
background(0);
smooth();
noFill();
for(int k=0;k<200;k++){
//stroke(255,0,0,100);
strokeWeight(floor(random(4)+1));
stroke(int(random(0, 255)), int(random(0, 255)), 
int(random(0, 255)), 100);  
float cx=random(1366);
float cy=random(768);
int r=floor(random(5)+1);
float[][] axis=new float[5][2];
float theta=PI/4;
float ini=0;
float incre=10;
for(int i=0;i<3+floor(random(7)+1);i++){
   r+=incre;  
  for(int n=0;n<5;n++){
  axis[n][0]=cx+r*cos(PI-theta*n);
  axis[n][1]=cy+r*sin(PI+ini+theta*n);
  }
 cx=cx+incre*cos(ini);
 ini+=PI; 

beginShape();
curveVertex(axis[0][0],axis[0][1]);
curveVertex(axis[0][0],axis[0][1]);
curveVertex(axis[1][0],axis[1][1]);
curveVertex(axis[2][0],axis[2][1]);
curveVertex(axis[3][0],axis[3][1]);
curveVertex(axis[4][0],axis[4][1]);
curveVertex(axis[4][0],axis[4][1]);
endShape();
}

}
noLoop();
}
</script>
<h1>Awkward Spirals</h1>
 <canvas id="mycanvas"></canvas>


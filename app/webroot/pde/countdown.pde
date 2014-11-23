import java.sql.Timestamp;
int i=0;
PFont font;
void setup() { 
 size(600, 300);
  background(0);
  frameRate(2);
  fill(255, 0, 0);

  font = createFont("High speed", 72);
  //font = createFont("ChessType", 72);
  //font = createFont("Subway Ticker", 72);
  //font = createFont("Digital-7", 100);
  //font = createFont("Balls on the rampage", 100);
  background(0);
  textFont(font);

  var today = new Date();

  int year = today.getFullYear();

  var end = new Date();
var end = new Date("December 31, "+year+" 23:59:59");

var diff= Math.floor((end.getTime() - today.getTime())/1000);
  
  console.log(year+" "+end.getTime()+" "+diff); 
var days = Math.floor(diff/3600/24);
var hours = Math.floor(diff%(3600*24)/3600);
var mins = Math.floor(diff%3600/60);
var seconds = diff%60;
console.log(hours+" "+seconds+" ");
  textAlign(CENTER);
  text(days, width/5, height/2); 
  text(hours, width*2/5, height/2); 
  text(mins, width*3/5, height/2);
  text(seconds, width*4/5, height/2);
}
void draw() {
 today = new Date();
  int year = today.getFullYear();
  end = new Date("December 31, "+year+" 23:59:59");
var diff= Math.floor((end.getTime() - today.getTime())/1000);
var  days = Math.floor(diff/3600/24);
var  hours = Math.floor(diff%(3600*24)/3600);
var mins = Math.floor(diff%3600/60);
var  seconds = diff%60;
  i++;
  background(0);
  textFont(font);
  textAlign(CENTER);
  if (i%2==1) {
    background(0);
    text(days, width/5, height/2); 
    text(hours, width*2/5, height/2); 
    text(mins, width*3/5, height/2);
    text(seconds, width*4/5, height/2); 
 } 
  else {
  }
}


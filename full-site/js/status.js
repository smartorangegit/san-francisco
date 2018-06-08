
for (var i=0; i<4; i++){
	var t=$("#container"+i).data('p');
	
	$("#container"+i).Progress({
  percent: t, // 20%
  width: 200,
  height: 30,
  backgroundColor: 'transparent',
  barColor: '#ef4136',
  fontColor: '#fff',
  radius: 0,
  fontSize: 14,
  increaseTime: 1000.00/60.00,
  increaseSpeed: 1,
  animate: true
});
	
}




/*
$("#container0").Progress({
  percent: 2, // 20%
  width: 200,
  height: 30,
  backgroundColor: 'transparent',
  barColor: '#ef4136',
  fontColor: '#fff',
  radius: 0,
  fontSize: 14,
  increaseTime: 1000.00/60.00,
  increaseSpeed: 1,
  animate: true
});
$("#container1").Progress({
  percent: 2, // 20%
  width: 200,
  height: 30,
  backgroundColor: 'transparent',
  barColor: '#ef4136',
  fontColor: '#fff',
  radius: 0,
  fontSize: 14,
  increaseTime: 1000.00/60.00,
  increaseSpeed: 1,
  animate: true
});
$("#container1").Progress({
  percent: 0, // 20%
  width: 200,
  height: 30,
  backgroundColor: 'transparent',
  barColor: '#ef4136',
  fontColor: '#fff',
  radius: 0,
  fontSize: 14,
  increaseTime: 1000.00/60.00,
  increaseSpeed: 1,
  animate: true
});
$("#container2").Progress({
  percent: 0, // 20%
  width: 200,
  height: 30,
  backgroundColor: 'transparent',
  barColor: '#ef4136',
  fontColor: '#fff',
  radius: 0,
  fontSize: 14,
  increaseTime: 1000.00/60.00,
  increaseSpeed: 1,
  animate: true
});
$("#container3").Progress({
  percent: 0, // 20%
  width: 200,
  height: 30,
  backgroundColor: 'transparent',
  barColor: '#ef4136',
  fontColor: '#fff',
  radius: 0,
  fontSize: 14,
  increaseTime: 1000.00/60.00,
  increaseSpeed: 1,
  animate: true
});*/
var disclosureElement = function (id,_bdc,_bdd,_bde){
	var el=document.getElementById(id);
	if(el.style.display=="none"){
		el.style.display="";
		_bc8.remove(_bdc,"disclosure-closed");
		_bc8.add(_bdc,"disclosure-open");
		if(_bdd){
			_bdc.innerHTML=_bdc.innerHTML.replace("show ","hide ");
		}
		if(typeof (_bde)=="function"){
			_bde("open");
		}
	} else {
		el.style.display="none";
		_bc8.remove(_bdc,"disclosure-open");
		_bc8.add(_bdc,"disclosure-closed");
		if(_bdd){
			_bdc.innerHTML=_bdc.innerHTML.replace("hide ","show ");
		}
		if(typeof (_bde)=="function"){
			_bde("close");
		}
	}
}
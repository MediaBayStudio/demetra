;(function() {
  function CalendarPicker(t,e){this.date=new Date,this._formatDateToInit(this.date),this.day=this.date.getDay(),this.month=this.date.getMonth(),this.year=this.date.getFullYear(),this.today=this.date,this.value=this.date,this.min=e.min,this.max=e.max,this._formatDateToInit(this.min),this._formatDateToInit(this.max),this.userElement=document.querySelector(t),this._setDateText(),this.calendarWrapper=document.createElement("div"),this.calendarElement=document.createElement("div"),this.calendarHeader=document.createElement("header"),this.calendarHeaderTitle=document.createElement("h4"),this.navigationWrapper=document.createElement("section"),this.previousMonthArrow=document.createElement("button"),this.nextMonthArrow=document.createElement("button"),this.calendarGridDays=document.createElement("section"),this.calendarGrid=document.createElement("section"),this.calendarDayElementType="time",this.listOfAllDaysAsText=["Пн","Вт","Ср","Чт","Пт","Сб","Вс"],this.listOfAllMonthsAsText=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],this.calendarWrapper.id="calendar-wrapper",this.calendarElement.id="calendar",this.calendarGridDays.id="calendar-days",this.calendarGrid.id="calendar-grid",this.navigationWrapper.id="navigation-wrapper",this.previousMonthArrow.id="previous-month",this.nextMonthArrow.id="next-month",this._insertHeaderIntoCalendarWrapper(),this._insertCalendarGridDaysHeader(),this._insertDaysIntoGrid(),this._insertNavigationButtons(),this._insertCalendarIntoWrapper(),this.userElement.appendChild(this.calendarWrapper)}Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector),Element.prototype.closest||(Element.prototype.closest=function(t){var e=this;do{if(Element.prototype.matches.call(e,t))return e;e=e.parentElement||e.parentNode}while(null!==e&&1===e.nodeType);return null}),CalendarPicker.prototype._getDaysInMonth=function(t,e){if((t||0===t)&&(e||0===e)){for(var a=new Date(e,t,1),n=[];a.getMonth()===t;)n.push(new Date(a)),a.setDate(a.getDate()+1);return n}},CalendarPicker.prototype._formatDateToInit=function(t){t&&t.setHours(0,0,0)},CalendarPicker.prototype._setDateText=function(){var t=this.date.toString().split(" ");this.dayAsText=t[0],this.monthAsText=t[1],this.dateAsText=t[2],this.yearAsText=t[3]},CalendarPicker.prototype._insertCalendarIntoWrapper=function(){this.calendarWrapper.appendChild(this.calendarElement);var t=t=>{t.target.nodeName.toLowerCase()!==this.calendarDayElementType||t.target.classList.contains("disabled")||(Array.from(document.querySelectorAll(".selected")).forEach(t=>t.classList.remove("selected")),t.target.classList.add("selected"),this.value=t.target.value,this.onValueChange(this.callback))};this.calendarGrid.addEventListener("click",t,!1),this.calendarGrid.addEventListener("keydown",e=>{"Enter"===e.key&&t(e)},!1)},CalendarPicker.prototype._insertHeaderIntoCalendarWrapper=function(){this.calendarHeaderTitle.textContent=this.listOfAllMonthsAsText[this.month]+" - "+this.year,this.calendarHeader.appendChild(this.calendarHeaderTitle),this.calendarWrapper.appendChild(this.calendarHeader)},CalendarPicker.prototype._insertCalendarGridDaysHeader=function(){this.listOfAllDaysAsText.forEach(t=>{var e=document.createElement("span");e.textContent=t,this.calendarGridDays.appendChild(e)}),this.calendarElement.appendChild(this.calendarGridDays)},CalendarPicker.prototype._insertNavigationButtons=function(){var t='<svg enable-background="new 0 0 386.257 386.257" viewBox="0 0 386.257 386.257" xmlns="http://www.w3.org/2000/svg"><path d="m0 96.879 193.129 192.5 193.128-192.5z"/></svg>';this.previousMonthArrow.innerHTML=t,this.nextMonthArrow.innerHTML=t,this.previousMonthArrow.setAttribute("aria-label","Go to previous month"),this.previousMonthArrow.setAttribute("type","button"),this.nextMonthArrow.setAttribute("aria-label","Go to next month"),this.nextMonthArrow.setAttribute("type","button"),this.navigationWrapper.appendChild(this.previousMonthArrow),this.navigationWrapper.appendChild(this.nextMonthArrow);var e=this;this.navigationWrapper.addEventListener("click",function(t){t.target.closest("#"+e.previousMonthArrow.id)&&(0===e.month?(e.month=11,e.year-=1):e.month-=1,e._updateCalendar()),t.target.closest("#"+e.nextMonthArrow.id)&&(11===e.month?(e.month=0,e.year+=1):e.month+=1,e._updateCalendar())},!1),e.calendarElement.appendChild(e.navigationWrapper)},CalendarPicker.prototype._insertDaysIntoGrid=function(){this.calendarGrid.innerHTML="";var t=this._getDaysInMonth(this.month,this.year),e=t[0].getDay();1<(e=0===e?7:e)&&(t=Array(e-1).fill(!1,0).concat(t)),t.forEach(t=>{var e=document.createElement(t?this.calendarDayElementType:"span"),a=t.toString().split(" ")[2];this.value.toString()===t.toString()&&(this.activeDateElement=e),(this.min||this.max)&&t.toString()!==this.today.toString()&&(t<this.min||t>this.max)?e.classList.add("disabled"):(e.tabIndex=0,e.value=t),e.textContent=t?a:"",this.calendarGrid.appendChild(e)}),this.calendarElement.appendChild(this.calendarGrid),this.activeDateElement.classList.add("selected")},CalendarPicker.prototype._updateCalendar=function(){this.date=new Date(this.year,this.month),this._setDateText(),this.day=this.date.getDay(),this.month=this.date.getMonth(),this.year=this.date.getFullYear();var t=this;window.requestAnimationFrame(function(){t.calendarHeaderTitle.textContent=t.listOfAllMonthsAsText[t.month]+" - "+t.year,t._insertDaysIntoGrid()})},CalendarPicker.prototype.onValueChange=function(t){if(this.callback)return this.callback(this.value);this.callback=t};


  const searchFrom = q('.search-form');

  if (!searchFrom) return;

  const dateField = q('.field__date', searchFrom);
  const dateInp = q('.field__inp-date', dateField)
  const dateCalendarWrapper = q('#input-date-calendar', dateField);
  const dateCalendar = new CalendarPicker('#input-date-calendar', {
    min: new Date(),
  });

  searchFrom.addEventListener('submit', function(e) {
    const regexp = /\d{2}.\d{2}.\d{4}/g;

    if (dateInp.value.length > 10) {
      console.log('asd');
      dateInp.value = dateInp.value.substring(0, 10);
    }

    if (!regexp.test(dateInp.value)) {
      dateInp.value = '';
    } else {
      dateInp.value = dateInp.value.substring(0, 10);
      let inpDate = dateInp.value.split('.');

      if (inpDate[0] > 31 || inpDate[1] > 12 || inpDate[2] > new Date().getFullYear() + 1) {
        dateInp.value = '';
      };
    }
  })

  dateCalendar.onValueChange(function() {
    dateInp.value = dateCalendar.value.toLocaleDateString()
  })

  dateInp.addEventListener('click', function() {
    dateCalendarWrapper.classList.toggle('open')
  })

  document.addEventListener('click', function(e) {
    if (!e.target.closest('.field__date')) {
      dateCalendarWrapper.classList.remove('open')
    }
  })
})()
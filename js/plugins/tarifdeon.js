(function($){

    /**
    >>>>>>>

    Wanna include in your project?

    More documentation on github:

    https://github.com/cant89/gianni-accordion-js

    >>>>>>>
    **/

    var gianniAccordion = (function(){
      return class {

        transitionendEventName(){
          var i,
              el = document.createElement('div'),
              transitions = {
                'transition': 'transitionend',
                'OTransition': 'otransitionend',
                'MozTransition': 'transitionend',
                'WebkitTransition': 'webkitTransitionEnd'
              };

          for (i in transitions) {
            if (transitions.hasOwnProperty(i) && el.style[i] !== undefined) {
              return transitions[i];
            }
          }
        }

        expand(el){
          function resetHeight(ev){
            if(ev.target != el.content) return
            el.content.removeEventListener(this.transitionendevent, bindEvent);

            if(!el.isOpen) return

            requestAnimationFrame(()=>{
              el.content.style.transition = '0';
              el.content.style.height = 'auto';

              requestAnimationFrame(()=>{
                el.content.style.height = null;
                el.content.style.transition = null;

                this.fire("elementOpened", el);
              });
            });
          }

          var bindEvent = resetHeight.bind(this);
          el.content.addEventListener(this.transitionendevent, bindEvent);

          el.isOpen = true;
          el.content.style.height = el.content.scrollHeight + "px";
        }

        collapse(el){

          function endTransition(ev){
            if(ev.target != el.content) return
            el.content.removeEventListener(this.transitionendevent, bindEvent);

            if(el.isOpen) return

            this.fire("elementClosed", el);
          }

          var bindEvent = endTransition.bind(this);
          el.content.addEventListener(this.transitionendevent, bindEvent);

          el.isOpen = false;

          requestAnimationFrame(()=>{
            el.content.style.transition = '0';
            el.content.style.height = el.content.scrollHeight + "px";

            requestAnimationFrame(()=>{
              el.content.style.transition = null;
              el.content.style.height = 0;
            });
          });
        }

        open(el){
          el.selected = true;
          this.fire("elementSelected", el);
          this.expand(el);
          el.wrapper.classList.add(this.selectedClass);
        }

        close(el){
          el.selected = false;
          this.fire("elementUnselected", el);
          this.collapse(el);
          el.wrapper.classList.remove(this.selectedClass);
        }

        toggle(el){
          if(el.selected){
            this.close(el);
          } else {
            this.open(el);

            if(this.oneAtATime){
              this.els.filter(e=>e!=el && e.selected).forEach(e=>{
                this.close(e);
              });
            }
          }
        }

        attachEvents(){
          this.els.forEach((el, i)=>{
            el.trigger.addEventListener("click", this.toggle.bind(this, el));
          });
        }

        setDefaultData(){
          this.els = [];
          this.events = {
            'elementSelected': [],
            'elementOpened': [],
            'elementUnselected': [],
            'elementClosed': []
          };
          this.transitionendevent = this.transitionendEventName();
          this.oneAtATime = true;
          this.selectedClass = "selected";
          this.trigger = "[data-accordion-element-trigger]";
          this.content = "[data-accordion-element-content]";
        }

        setCustomData(data){
          var keys = Object.keys(data);

          for(var i=0; i<keys.length; i++){
            this[ keys[i] ] = data[ keys[i] ];
          }
        }

        fire(eventName, el){
          var callbacks = this.events[eventName];
          for(var i=0; i<callbacks.length; i++){
            callbacks[i]( el )
          }
        }

        on(eventName, cb){
          if( !this.events[eventName] ) return
          this.events[eventName].push(cb);
        }

        constructor(data){
          this.setDefaultData();
          this.setCustomData(data); // ES6 => Object.assign(this, data)

          [].forEach.call( document.querySelectorAll(this.elements), (el, i)=>{
            this.els.push({
              wrapper: el,
              trigger: el.querySelector(this.trigger),
              content: el.querySelector(this.content)
            });

            this.els[i].content.style.height = 0;
          });

          this.attachEvents();
        }

      }
    })();

    var myAccordion = new gianniAccordion({
      elements: ".card .item-card"
    });

    myAccordion.on("elementSelected", (data)=>{
      console.log("elementOpened", data);
    });

})(jQuery);

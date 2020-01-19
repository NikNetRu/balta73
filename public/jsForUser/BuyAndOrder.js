class BuyAndOrder {
    //$item - передаваемый ID элемента, из таблицы goods
    //$itemOrder - ID элемента к которому прикреляется элемент списка Bootstrap
    //так же создаются скрыте инпуты - костыли
     static addToCart (item, itemOrder = "oderFlow") {
         
        let container = item;
        if (document.getElementById('product'+container.id)){
            
           let elChildOrder = document.getElementById("num"+container.id+container.name); // блок див внутри элемента списка, содержащий количество товара
           let elNumUser = document.getElementById("numId"+container.id); //получем из формы заполненное поле количество
           let orderNum = Number.parseInt(elChildOrder.value);
           let userNum = Number.parseInt(elNumUser.value);
           orderNum += userNum;
           elChildOrder.num = orderNum;
           elChildOrder.value = orderNum;
           
           
        }
        else{
            
            let elOrder =  document.getElementById("orderFlow");
            let elChildOrder = document.createElement('a');
            elChildOrder.classList.add("dropdown-item");
            elChildOrder.id = 'product'+container.id;
            let elNum = document.getElementById("numId"+container.id);
            container.num = elNum.value;
            elChildOrder.num = container.num;
            //Далее создадим котнтейнеры для заказа
            elChildOrder.innerHTML = "<div class = \"row\" id = \"orderData\"><input id = \""+container.name+"\" name = \""+container.name+"\" value = \""+container.name+"\"disabled>"+
                                        "<input id = \""+container.cost+"\" name = \""+container.cost+"\" value = \""+container.name+"\"disabled > р"+"<input id = \"num"+container.id+container.name+"\"value = \""+container.num+"\"></div>";
            elOrder.appendChild(elChildOrder);
            ///////////////////////////////////////////////////////////////////////////////
            //скрытые input для будущей отправки
            let hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('id', container.id);
            hiddenInput.setAttribute('name', container.id);
            hiddenInput.setAttribute('hidden', 'true');
            hiddenInput.setAttribute('value', container.num);
            let fatherHiddenInput = document.getElementById('orderForm');
            fatherHiddenInput.appendChild(hiddenInput);
            //////////////////////////////////////////////////////////////////////////////
            /*
             * проверим существование кнопки оформить
             * Создадим её или null
             */
                if (document.getElementById("blockOrder")) {
                    //let blockOrder = document.getElementById("aceptOrder");
                    //let childBlockOrder = document.getElementById("blockOrder");
                    //blockOrder.removeChild(childBlockOrder);
                    //elOrder.appendChild(getOrder);
                }
                else {
                    /*
                    let buttonGetOrder = document.createElement('div');
                    buttonGetOrder.id = "blockOrder";
                    buttonGetOrder.innerHTML = "<button type=\"submit\" class=\"btn btn-primary\ id = \"getOrder\" >Оформить</button>";
                    let buttonAceptOrder = document.getElementById("aceptOrder");
                    buttonAceptOrder.appendChild(buttonGetOrder);
                    */
                }
            }
        
    }
    //отправить в сессию данные мз формы
    
    static sendToCart (item) {
        let id = item.id;
        let num = document.getElementById('numId'+item.id);
        this.addToCart(item);
        $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });

        $.ajax
                    ({
                            url: "BuyThis",
                            type: "POST",
                            data: ({id : id, num : num.value})
                        
                    });
         
    } ;
    
    
        
    
 }

$(window).ready(() => {

    //Narrative Activities
    let actTitle = $('#actTitle');
    let startDate = $('#startDate');
    let endDate = $("#endDate");

    $('#actTable').on('submit', function(e){
        
        e.preventDefault();

        $('#items').append(
            `
            <tr>
                <th scope="row">${actTitle.val()}</th>
                <td>${startDate.val()}</td>
                <td>${endDate.val()}</td>
                <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
            </tr>
            `
        )
        $('.removeBtn').on('click', function(){
            $(this).closest('tr').remove();
        });
    })

    
     //Proposal Coorganizer
     let coorganizer = $('#coorganizer');
     let coorgContactNum = $('#coorgContactNum');
     let coorgEmail = $('#coorgEmail');
 
    $('#coorgForm').on('submit', function(e){
        
        e.preventDefault();

        $('#coorgItems').append(
            `
            <tr>
                <th scope="row">${coorganizer.val()}</th>
                <td>${coorgContactNum.val()}</td>
                <td>${coorgEmail.val()}</td>
                <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
            </tr>
            `
        )
        $('.removeBtn').on('click', function(){
    
            $(this).closest('tr').remove();
        });
    })


    //Proposal Program
    let programme = $('#programme');
    let progStartDate = $('#progStartDate');
    let progEndDate = $('#progEndDate');


    $('#programmeForm').on('submit', function(e){
        
        e.preventDefault();

        $('#programmeItems').append(
            `
            <tr>
                <th scope="row">${programme.val()}</th>
                <td>${progStartDate.val()}</td>
                <td>${progEndDate.val()}</td>
                <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
            </tr>
            `
        )
        $('.removeBtn').on('click', function(){
    
            $(this).closest('tr').remove();
        });
    })


    //Requisitions
    let qty = $('#qty');
    let particulars = $('#particulars');
    let cost = $('#cost');
    $('#reqForms').on('submit', function(e){
        
        e.preventDefault();

        $('#reqItems').append(
            `
            <tr>
                <th scope="row">${qty.val()}</th>
                <td>${particulars.val()}</td>
                <td>${cost.val()}</td>
                <td class="itemCost">${cost.val() * qty.val()}</td>
                <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
            </tr>
            `
        )
        getTotalCost();
      
        $('.removeBtn').on('click', function(){
            $(this).closest('tr').remove();
            getTotalCost();
        });
        
    });
    

    //Liquidation
    let dateBought = $('#dateBought');
    let itemQty = $('#itemQty');
    let items = $('#items');
    let amount = $('#amount');

    $('#liqForms').on('submit', function(e){
        
        e.preventDefault();

        $('#liqItems').append(
            `
            <tr>
                <th scope="row">${dateBought.val()}</th>
                <td>${itemQty.val()}</td>
                <td>${items.val()}</td>
                <td>${amount.val()}</td>
                <td class="itemExpense">${itemQty.val() * amount.val()}</td>
                <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
            </tr>
            `
        )
        getTotalExpense();

        $('.removeBtn').on('click', function(){
            $(this).closest('tr').remove();
            getTotalExpense();
        });
    });

    //For Requisition Form
    function getTotalCost(){
        let itemsArray = [];

        $('.itemCost').each(function () {
            if(this.textContent.length != 0) {
                itemsArray.push(this.textContent);
            }
        });
        $('#totalCost').html(computeTotal(itemsArray));
    }

    //For Liquidation Form
    function getTotalExpense(){
        let itemsArray = [];
        
        $('.itemExpense').each(function () {
            if(this.textContent.length != 0) {
                itemsArray.push(this.textContent);
            }
        });
        $('#totalExpense').html(computeTotal(itemsArray));
    }

    //Compute the sum of ItemsArray for requisition and liquidation table
    function computeTotal(itemsArray){
        let totalCost = 0;
        
        for(let i = 0; i < itemsArray.length; i++){
            let items = itemsArray[i] * 1;
            totalCost += items;
        }
        return totalCost;
    }


    

});

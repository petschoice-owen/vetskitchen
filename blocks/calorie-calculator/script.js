jQuery(function ($) {
    $(document).ready(function(){
		var breed_arry =  new Array(
            new Array('1.6', 'Cross breed'),
            new Array('1.6', 'Affenpinshcer'),
            new Array('1.6', 'Afghan Hound'),
            new Array('1.6', 'Airedale Terrier'),
            new Array('1.6', 'Alaskan Malamute'),
            new Array('1.6', 'Anatolian Shepherd Dog'),
            new Array('1.6', 'Australian Cattle Dog'),
            new Array('1.6', 'Australian Silky Terrier'),
            new Array('1.6', 'Australian Terrier'),
            new Array('1.6', 'Basenji'),
            new Array('1.4', 'Basset Hound'),
            new Array('1.4', 'Beagle'),
            new Array('1.6', 'Bearded Collie'),
            new Array('1.6', 'Bedlington Terrier'),
            new Array('1.6', 'Belgian Shepherd Dog'),
            new Array('1.6', 'Bichon Frise'),
            new Array('1.6', 'Bloodhound'),
            new Array('1.6', 'Border Collie'),
            new Array('1.6', 'Border Terrier'),
            new Array('1.6', 'Borzoi'),
            new Array('1.6', 'Boston Terrier'),
            new Array('1.6', 'Bouvier des Flandres'),
            new Array('1.4', 'Boxer'),
            new Array('1.6', 'Briard'),
            new Array('1.6', 'Brittany'),
            new Array('1.4', 'Bulldog'),
            new Array('1.6', 'Bullmastiff'),
            new Array('1.6', 'Bull Terrier'),
            new Array('1.4', 'Cairn Terrier'),
            new Array('1.6', 'Canaan Dog'),
            new Array('1.4', 'Cavalier King Charles Spaniel'),
            new Array('1.6', 'Chesapeake Bay Retriever'),
            new Array('1.4', 'Chihuahua (Long Coat)'),
            new Array('1.4', 'Chihuahua (Short Coat)'),
            new Array('1.6', 'Chinese Crested Dog'),
            new Array('1.4', 'Chow Chow'),
            new Array('1.4', 'Clumber Spaniel'),
            new Array('1.4', 'Cocker Spaniel'),
            new Array('1.6', 'Collie (Rough)'),
            new Array('1.6', 'Collie (Smooth)'),
            new Array('1.6', 'Curly-coated Retriever'),
            new Array('1.4', 'Dachshund (Min)'),
            new Array('1.4', 'Dachshund (Std)'),
            new Array('1.6', 'Dalmation'),
            new Array('1.6', 'Dandie Dinmont Terrier'),
            new Array('1.6', 'Deerhound'),
            new Array('1.6', 'Dobermann'),
            new Array('1.6', 'Elkhound'),
            new Array('1.4', 'English Bull Dog'),
            new Array('1.6', 'English Setter'),
            new Array('1.6', 'English Springer Spaniel'),
            new Array('1.6', 'English Toy Terrier'),
            new Array('1.6', 'Eskimo Dog'),
            new Array('1.6', 'Field Spaniel'),
            new Array('1.6', 'Finnish Spitz'),
            new Array('1.6', 'Flat coated Retriever'),
            new Array('1.6', 'Foxhound'),
            new Array('1.6', 'Fox Terrier'),
            new Array('1.4', 'French Bulldog'),
            new Array('1.4', 'German Shepherd Dog (Alsatian)'),
            new Array('1.6', 'German Short Haired Pointer'),
            new Array('1.6', 'German Spitz - Klein (Small)'),
            new Array('1.6', 'Glen of Imaal Terrier'),
            new Array('1.4', 'Golden Retriever'),
            new Array('1.6', 'Gordon Setter'),
            new Array('1.6', 'Great Dane'),
            new Array('1.6', 'Greyhound'),
            new Array('1.6', 'Griffon Bruxellois'),
            new Array('1.6', 'Hovawart'),
            new Array('1.6', 'Hungarian Vizsla'),
            new Array('1.6', 'Irish Setter'),
            new Array('1.6', 'Irish Setter (Red and White)'),
            new Array('1.6', 'Irish Terrier'),
            new Array('1.6', 'Irish Water Spaniel'),
            new Array('1.6', 'Irish Wolfhound'),
            new Array('1.6', 'Italian Greyhound'),
            new Array('1.6', 'Italian Spinone'),
            new Array('1.6', 'Japanese Akita'),
            new Array('1.6', 'Japanese Chin'),
            new Array('1.6', 'Keeshond'),
            new Array('1.6', 'Kerry Blue Terrier'),
            new Array('1.6', 'King Charles Spaniel'),
            new Array('1.6', 'Komondor'),
            new Array('1.6', 'Labrador Retriever'),
            new Array('1.6', 'Lakeland Terrier'),
            new Array('1.6', 'Lancashire Heeler'),
            new Array('1.6', 'Large Munsterlander'),
            new Array('1.6', 'Lhaso Apso'),
            new Array('1.6', 'Lowchen'),
            new Array('1.6', 'Maltese'),
            new Array('1.6', 'Manchester Terrier'),
            new Array('1.6', 'Maremma Sheepdog'),
            new Array('1.6', 'Mastiff'),
            new Array('1.6', 'Miniature Pinscher'),
            new Array('1.6', 'Neopolitan Mastiff'),
            new Array('1.4', 'Newfoundland'),
            new Array('1.6', 'Norfolk Terrier'),
            new Array('1.6', 'Norwich Terrier'),
            new Array('1.6', 'Old English Sheepdog'),
            new Array('1.6', 'Otterhound'),
            new Array('1.6', 'Papillion'),
            new Array('1.6', 'Pekingese'),
            new Array('1.6', 'Petit Basset Griffon Vendeen'),
            new Array('1.6', 'Pharoah Hound'),
            new Array('1.6', 'Pointer'),
            new Array('1.6', 'Polish Lowland Sheepdog'),
            new Array('1.6', 'Pomeranian'),
            new Array('1.6', 'Poodle (Std)'),
            new Array('1.6', 'Poodle (Min)'),
            new Array('1.6', 'Poodle (Toy)'),
            new Array('1.6', 'Portuguese Water Dog'),
            new Array('1.4', 'Pug'),
            new Array('1.6', 'Puli'),
            new Array('1.6', 'Pyrenean Mountain Dog'),
            new Array('1.6', 'Rhodesian Ridgeback'),
            new Array('1.4', 'Rottweiler'),
            new Array('1.4', 'St Bernard'),
            new Array('1.6', 'Saluki'),
            new Array('1.6', 'Samoyed'),
            new Array('1.6', 'Schipperke'),
            new Array('1.6', 'Schnauzer (Giant)'),
            new Array('1.6', 'Schnauzer (Std)'),
            new Array('1.6', 'Schnauzer (Min)'),
            new Array('1.4', 'Scottish Terrier'),
            new Array('1.6', 'Sealyham Terrier'),
            new Array('1.6', 'Shar Pei'),
            new Array('1.4', 'Shetland Sheepdog'),
            new Array('1.6', 'Shih Tzu'),
            new Array('1.6', 'Siberian Husky'),
            new Array('1.6', 'Skye Terrier'),
            new Array('1.6', 'Soft Coated Wheaton Terrier'),
            new Array('1.6', 'Staffordshire Bull Terrier'),
            new Array('1.6', 'Sussex Spaniel'),
            new Array('1.6', 'Swedish Vallhund'),
            new Array('1.6', 'Tibetan Spaniel'),
            new Array('1.6', 'Tibetan Terrier'),
            new Array('1.4', 'Wiemaraner'),
            new Array('1.4', 'Welsh Corgi (Cardigan)'),
            new Array('1.4', 'Welsh Corgi (Pembroke)'),
            new Array('1.6', 'Welsh Springer Spaniel'),
            new Array('1.6', 'Welsh Terrier'),
            new Array('1.4', 'West Highland White Terrier'),
            new Array('1.6', 'Whippet'),
            new Array('1.6', 'Yorkshire Terrier'),
        );
		var options_string = "";
        breed_arry.forEach(function(item) {
			
			options_string += '<option value="'+item[0]+'" data-value="'+item[1]+'">'+item[1]+'</option>';
        });
      
      	$("#dog_breed").append(options_string);
          $(".calculate").on("click", function(){
            $(".results_block").hide();
                var pet_name = $.trim($("#pet_name").val());
                if(pet_name == ""){
                    alert("Please enter your dog's name");
                    $("#pet_name").focus();
                    return false;
                }
                
                var dog_breed = $.trim($("#dog_breed").val());
                if(dog_breed == ""){
                    alert("Please select your dog's breed");
                    $("#dog_breed").focus();
                    return false;
                }
              
                var cross_breed_confirm = "2";
                if($("input[name='cross_breed_confirm']").is(":checked")){
                    cross_breed_confirm = $("input[name='cross_breed_confirm']:checked").val();
                }
              
                var fully_grown = "no";
                if($("input[name='fully_grown']").is(":checked")){
                    fully_grown = $("input[name='fully_grown']:checked").val();
                }else{
                    alert("Our calorie calculator is designed for adult dogs. We’ll happily give advice for puppies if you’d like to contact us");
                    $("input[name='fully_grown']").focus();
                    return false;
                }
                var age_years = $.trim($("#age_years").val());
                var age_months = $.trim($("#age_months").val());
        
                var dog_weight = $.trim($("#dog_weight").val());
                if(dog_weight == ""){
                    alert("Please enter your dog's weight");
                    $("#dog_weight").focus();
                    return false;
                }
                var neutered = "1.8";
                if($("input[name='neutered']").is(":checked")){
                    neutered = $("input[name='neutered']:checked").val();
                }
                var dog_health = 0;
                if($("input[name='dog_health']").is(":checked")){
                    dog_health = $("input[name='dog_health']:checked").val();
                }
            
                if(dog_health === 0){
                    alert("Please select a card that closely matches your dog ");
                    $("input[name='dog_health']").focus();
                    return false;
                }
            
                var dog_excercise = $.trim($("#dog_excercise").val());
                if(dog_excercise == ""){
                    alert("Please select your dog's excercise level");
                    $("#dog_excercise").focus();
                    return false;
                }
            
                var suggested_ideal_weight = $.trim($("#suggested_ideal_weight").val());
            
                if(fully_grown == "yes"){
                var resting_energy_requirements = Math.ceil(70*(Math.pow(dog_weight, 0.75)));
      
                  
                var max_array = [dog_health, neutered, dog_excercise];
                var get_max = Math.max(...max_array);
                    if($("#dog_breed").find(":selected").data("value") == "Cross breed" && $("input[name='cross_breed_confirm']").is(":checked")){
                        if(cross_breed_confirm == "1.4"){
                            if(dog_excercise == "1.4"){
                                var true_cross_feed = "1.2";
                            }else{
                                var true_cross_feed = "1.4";
                            }
                            
                        }else{
                            var true_cross_feed = "2";
                        }
                      
                        var min_array = [dog_excercise, get_max, dog_breed, true_cross_feed];
                    }else{
                        var min_array = [dog_excercise, get_max, dog_breed];
                    }
                
                var get_min = Math.min(...min_array);
      
                var rer_multiple = get_min;
                if( dog_health == "-1" || dog_health == "-1.8" ) {
                    rer_multiple = 1;
                }else if( dog_health == "2"  && ( dog_excercise == "1.4" || dog_excercise == "1.6" || dog_excercise == "1.8") ) {
                    rer_multiple = 1.8;
                }else if(get_max > 1.6){
                    if(cross_breed_confirm == "1.4" && (dog_excercise == "1.8" || dog_excercise == "2")){
                        get_max = dog_excercise - 0.2;
                    }
                    rer_multiple = get_max;
                }else{
                    rer_multiple = get_min;
                }
                var dog_daily_energy_required = "";
                if(dog_health == "-1" || dog_health == "-1.8"){
                    dog_daily_energy_required = Math.ceil(70*(Math.pow(suggested_ideal_weight, 0.75)));
                }else{
                    dog_daily_energy_required = resting_energy_requirements * rer_multiple;
                }
      
                if($("input[name='dog_health']:checked").val() == "0"){
                    suggested_ideal_weight = dog_weight;
                }
      
                var dog_weight_type = $("#dog_weight_type").val();
                var dog_weight_type_html = dog_weight_type;
      
                var result = '<div>Current Weight: <span>'+parseInt(dog_weight)+'</span><h5>'+dog_weight_type_html+'</h5></div>'+
                              '<div>Ideal Weight: <span>'+parseInt(suggested_ideal_weight)+'<span><h5>'+dog_weight_type_html+'</h5></div>'+
                                '<div><b>'+pet_name+'\'s </b> Kcals/day: <span>'+parseInt(dog_daily_energy_required)+'</span></div>';
      // 						  '<p class="dog_weight_type_html">'+dog_weight_type_html+'</p>'+
      // 						  '<p class="dog_weight_type_html">'+dog_weight_type_html+'</p>';
                $(".results_block").html(result);
                $(".results_block").css("display", "flex");
                
                
                var chicken_brown_rice = ((dog_daily_energy_required / 368) * 100);
                var salmon_sweet_potato = ((dog_daily_energy_required / 348) * 100);
                var senior_protect_care = ((dog_daily_energy_required / 346) * 100);
                var light_healthy_weight = ((dog_daily_energy_required / 339) * 100);
                var senior_sensitive_care_turkey = ((dog_daily_energy_required / 340) * 100);
                var portk_potato_sensitive_care = ((dog_daily_energy_required / 363) * 100);
      
                var products = "";
                if(age_years <= 6){
                    var products_array = [
                        {
                            "img": "https://cdn.shopify.com/s/files/1/0388/4223/7067/products/sensitive-care-dry-food-pork-potato-adult_1024x1024.jpg?v=1610999731",
                            "url": "https://vetskitchenuk.myshopify.com/collections/dry-dog-food/products/sensitive-care",
                            "title": "Sensitive Care Dry Food Grain Free Pork & Potato",
                            "price": "£7.00",
                            "desc": "Vet’s Kitchen® Sensitive Care range is a complete dry dog food which provides perfectly balanced nutrition in a delicious tasting meal and is ideal for sensitive adult dogs.",
                            "feed_per_day": parseInt(portk_potato_sensitive_care),
                        },
                        {
                            "img": "https://cdn.shopify.com/s/files/1/0388/4223/7067/products/everyday-health-chicken-rice-adult-vetskitchen_1024x1024.jpg?v=1610444949",
                            "url": "https://vetskitchenuk.myshopify.com/collections/dry-dog-food/products/everyday-health-dry-food",
                            "title": "Everyday Health Dry Food Chicken & Brown Rice",
                            "price": "£6.00",
                            "desc": "Vet’s Kitchen® Everyday Health Chicken & Brown Rice is a complete dry dog food which provides perfectly balanced nutrition in a delicious tasting meal and is ideal to maintain the everyday health of your adult dog.",
                            "feed_per_day": parseInt(chicken_brown_rice),
                        },
                        {
                            "img": "https://cdn.shopify.com/s/files/1/0388/4223/7067/products/sensitive-salmon_1024x1024.png?v=1625042084",
                            "url": "https://vetskitchenuk.myshopify.com/collections/dry-dog-food/products/sensitive-care-br-salmon-sweet-potato",
                            "title": "Sensitive Care Salmon & Sweet Potato",
                            "price": "£7.00",
                            "desc": "Our Salmon & Potato dog food is hypoallergenic, contains high-quality salmon and has been carefully formulated to give your adult dog the very best in nutritional care.",
                            "feed_per_day": parseInt(salmon_sweet_potato),
                        }
                    ];
                }else if(age_years => 7){
                    var products_array = [
                        {
                            "img": "https://cdn.shopify.com/s/files/1/0388/4223/7067/products/protect-care-salmon-rice-senior-vetskitchen_1024x1024.jpg?v=1610999571",
                            "url": "https://vetskitchenuk.myshopify.com/collections/dry-dog-food/products/senior-protect-care-dry-food-salmon-brown-rice",
                            "title": "Senior Protect & Care Dry Food Salmon & Brown Rice",
                            "price": "£6.00",
                            "desc": "Vet’s Kitchen® Protect & Care range is a complete dry dog food which provides perfectly balanced nutrition in a delicious tasting meal and is ideal for senior dogs.",
                            "feed_per_day": parseInt(senior_protect_care),
                        },
                        {
                            "img": "https://cdn.shopify.com/s/files/1/0388/4223/7067/products/sensitive-turkey_1024x1024.png?v=1625131849",
                            "url": "https://vetskitchenuk.myshopify.com/collections/dry-dog-food/products/sensitive-care-dry-dog-food-br-grain-free-turkey-sweet-potato",
                            "title": "Sensitive Care Senior Dry Dog Food Grain Free Turkey & Sweet Potato",
                            "price": "£7.00",
                            "desc": "Vet’s Kitchen® Sensitive Care Turkey & Sweet Potato is a complete dry dog food which provides perfectly balanced nutrition in a delicious tasting meal and is ideal for sensitive senior dogs.",
                            "feed_per_day": parseInt(senior_sensitive_care_turkey),
                        }
                    ];
                }
                
                if($("input[name='dog_health']:checked").val() == "-1" || $("input[name='dog_health']:checked").val() == "-1.8"){
                    var products_array = [
                            {
                                "img": "https://cdn.shopify.com/s/files/1/0388/4223/7067/products/everyday-health-chicken-rice-vetskitchen_1024x1024.jpg?v=1625041927",
                                "url": "https://vetskitchenuk.myshopify.com/collections/dry-dog-food/products/healthy-weight-dry-food",
                                "title": "Healthy Weight Dry Food Chicken & Brown Rice",
                                "price": "£6.00",
                                "desc": "Vet’s Kitchen® Healthy Weight Chicken & Brown Rice is a complete dry dog food, providing balanced nutrition in a delicious tasting meal to help adult dogs achieve & maintain a healthy weight.",
                                "feed_per_day": parseInt(light_healthy_weight),
                            }
                    ];
                }
              products += '<div class="product_box_title">'+
                '<h2>'+pet_name+'\'s Recommended food From vet\'s kitchen</h2>'+
              '</div>';
                products_array.forEach(function(item) {
                  products += '<div class="product_box_main alignfull">'+
                              '	<div class="container">'+
                              '	  <div class="products_wrapper">'+
                              '		<div class="product_box_left">'+
                              '		<div class="product_box_left_wrapper">'+
                              '		  <div class="product_img">'+
                              '			<img class="product-image" src="'+item.img+'" alt="'+item.title+'">'+
                              '		  </div>'+
                              ''+
                              '		  <div class="product_desc">'+
                              '			<h3>'+item.title+'</h3>'+
                              '			<div class="price">'+
                              '			  <p>'+item.price+'</p>'+
                              '			</div>'+
                              '			<p>'+item.desc+'</p>'+
                              ''+
                              '			<button>Add to cart</button>'+
                              '			<a href="'+item.url+'">Learn More <img src="/wp-content/themes/vetskitchen/assets/images/calculator/right_arrow.png"></a>'+
                              '		  </div>'+
                              '		</div>'+
                              '	  </div>'+
                              '	  <div class="product_box_right">'+
                              '		<h4>How much?</h4>'+
                              '		<img src="/wp-content/themes/vetskitchen/assets/images/calculator/dog-bowl-icon-01.webp">'+
                              '		<h5>feed '+pet_name+'</h5>'+
                              '		<h2>'+item.feed_per_day+'g</h2>'+
                              '		<p>Per day</p>'+
                              '	  </div>'+
                              '	  '+
                              '	  </div>'+
                              '	  '+
                              '	  '+
                              '	</div>'+
                              '</div>';
                });
                
                $(".product_box_wrapper").html(products);
      
            }else{
              alert("Our calorie calculator is designed for adult dogs. We’ll happily give advice for puppies if you’d like to contact us");
            }
          });
      
        $("#dog_breed").on("change", function(){
            if($(this).find(":selected").data("value") == "Cross breed"){
                $(".cross_breed_confimation_box").show();
            }else{
                $(".cross_breed_confimation_box").hide();
            }
        });
        $("input[name='dog_health']").on("change", function(){
            var dog_health = $(this).val();
            
            if(dog_health == "0"){
                $(".suggested_ideal_weight_wrapper").hide();
            }else{
                var dog_weight = $("#dog_weight").val();
                if($.trim(dog_weight) != ""){
                    var percent_to_loose = "";
                    if(dog_health == "2" || dog_health == "1.8" || dog_health == "0"){
                        percent_to_loose = 0;
                    }else if(dog_health == "-1"){
                        percent_to_loose = 0.15;
                    }else if(dog_health == "-1.8"){
                        percent_to_loose = 0.4;
                    }
                    var weight_to_loose = dog_weight * percent_to_loose;
                    var suggested_ideal_weight = dog_weight - weight_to_loose;
    
                    $("#suggested_ideal_weight").val(suggested_ideal_weight.toFixed(2));
                    $(".suggested_ideal_weight_wrapper").show();
                }
                
            }
    
        });
          
        
        $("input[name='fully_grown']").on("change", function(){
            var fully_grown = $(this).val();
            
            if(fully_grown == "no"){
                $(".hide_div").hide();
                $(".fully_grown_no_box").show();
            }else{
                $(".hide_div").show();
                $(".fully_grown_no_box").hide();
            }
    
        });
        
        $(".steps_btn").on("click", function() {
            $('html,body').animate({
                scrollTop: $(this).parents(".item").next(".item").offset().top - $('.header__fixedscroll').height()},
            'slow');
        });
        
	});
});
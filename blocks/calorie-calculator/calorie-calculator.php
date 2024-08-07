<?php

/**
 * Calorie Calculator Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

$wrapper_attributes = get_block_wrapper_attributes(
    [
        'class' => 'vetskitchen-calorie-calculator',
        'id'    =>  isset($block['anchor']) ? $block['anchor'] : ''
    ]
);
?>
<?php
if ( isset($block['data']['preview_image_calorie_calculator']) ) :
    echo '<img src="'. get_template_directory_uri() .'/assets/images/blocks-preview/calorie-calculator.png" style="width:100%; height:auto;">';
else :
?>  
    <div <?php echo $wrapper_attributes; ?>>
        <form>
            <div class="item">
                <div class="custom-row">
                    <div class="cols-4 order-2">
                        <div class="blue-box">
                            <div class="inner-wrapper">
                                <h3>Useful things to know</h3>
                                <div class="wrapper">
                                    <div class="img-box">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/weight-scale-icon.webp" alt="Current weight of your pet">
                                    </div>
                                    <div class="text-block">
                                        <h4>Current weight of your pet</h4>
                                        <p>This will help us calculate the right amount of food your pet should be eating. You do not have to know the exact weight, but the closer you are, the better we can calculate.</p>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <div class="img-box">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/no-entry-sign-icon.webp" alt="For grown ups only">
                                    </div>
                                    <div class="text-block">
                                        <h4>For grown ups only</h4>
                                        <p>Our calorie calculator is designed for adult dogs. We’ll happily give advice for puppies if you’d like to contact us</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cols-4 border-left order-1">
                        <div class="content">
                            <div class="item-count">1</div>
                            <div class="form-group">
                                <label>Your Pet’s Name</label>
                                <input type="text" name="pet_name" id="pet_name" class="form-input" placeholder="Bruce">
                            </div>
                            <div class="form-group">
                                <label>What breed is your dog?</label>
                                <select class="form-input" name="dog_breed" id="dog_breed">
                                    <option value="">Choose a breed</option>
                                </select>
                            
                                <div class="cross_breed_confimation_box">
                                    <h4>DOES YOUR DOGS BREED CONTAIN ANY OF THE FOLLOWING?</h4>
                                    <p>Basset Hound, Beagle, Cocker Spaniel, Dachshund, English Bulldog, Golden Retriever,Labrador, Newfoundland, Pug, Rottweiler, Chihuahuas, Cairn Terrier, Scottish Terriers, St. Bernard, Boxer, Cavalier King Charles Spaniel, German Sheppard, West Highland White Terrier, Shetland sheep dog, Weimaraner</p>
                                    <div class="buttons">
                                        <div class="custom-radio">
                                            <input type="radio" id="cross_breed_confirm_yes" name="cross_breed_confirm" value="1.4">
                                            <label for="cross_breed_confirm_yes">Yes</label>
                                        </div>
                                        <div class="custom-radio">
                                            <input type="radio" id="cross_breed_confirm_no" value="1.6" name="cross_breed_confirm">
                                            <label for="cross_breed_confirm_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>What age is your dog?</label>
                                <div class="form-inline">
                                    <input type="number" class="form-input w-45" name="age_years" id="age_years" placeholder="Years">
                                    <input type="number" class="form-input w-45" name="age_months" id="age_months" placeholder="Months">
                                </div>
                            </div>
                            <div class="button">
                                <a href="#" class="steps_btn">Next Step</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="custom-row">
                    <div class="cols-4 border-left">
                        <div class="content">
                            <div class="item-count"><a id="step_2">2</a></div>
                            <div class="form-group">
                                <label>Is your dog fully grown?</label>
                                <div class="buttons">
                                    <div class="custom-radio">
                                        <input type="radio" id="fully_grown_yes" name="fully_grown" value="yes">
                                        <label for="fully_grown_yes">Yes</label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="fully_grown_no" value="no" name="fully_grown">
                                        <label for="fully_grown_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="fully_grown_no_box">
                                <h4>Sorry, our calorie calculator is only intended for fully grown dogs.</h4>
                            </div>
                            <div class="form-group hide_div">
                                <label>Is your dog neutered?</label>
                                <div class="buttons">
                                    <div class="custom-radio">
                                        <input type="radio" id="neutered_yes" name="neutered" value="1.6">
                                        <label for="neutered_yes">Yes</label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="neutered_no" value="1.8" name="neutered">
                                        <label for="neutered_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide_div">
                                <label>How much does your dog weigh?</label>
                                <div class="form-inline justify-close">
                                    <input type="number" id="dog_weight" name="dog_weight" class="form-input w-60" placeholder="Please enter a weight">
                                    <select class="form-input w-20" id="dog_weight_type" name="dog_weight_type">
                                        <option value="Kg">Kg</option>
                                        <option value="LBS">Pound</option>
                                    </select>
                                </div>
                            </div>
                            <div class="button hide_div">
                                <a href="#" class="steps_btn">Next Step</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item hide_div">
                <div class="custom-row">
                    <div class="cols-8 border-left">
                        <div class="content pb-70">
                            <div class="item-count"><a id="step_3">3</a></div>
                            <div class="select-weigh">
                                <div class="form-group">
                                    <label for="">Please click on an image that looks most like your dog below</label>
                                </div>
                                <div class="custom-box">
                                    <div class="cols">
                                        <div class="boxes">
                                            <input type="radio" id="dog_health_a" name="dog_health" value="2">
                                            <div class="inner-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0005_very-underweight-static.webp" alt="Dog Icon" class="show-img">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0004_very-underweight-selected.webp" alt="Dog Icon" class="selected-img">
                                                </div>
                                                <div class="inner-count">A</div>
                                                </div>
                                            <div class="text-box">
                                                <h4>Very Underweight</h4>
                                                <p>Ribs, spine, pelvic bones and lumbar vertebra obvious with minimal muscle mass <br>
                                                    Pronounced abdominal tuck <br>
                                                    No palpable fat</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="boxes">
                                            <input type="radio" id="dog_health_b" value="1.8" name="dog_health">
                                            <div class="inner-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0007_underweight-static.webp" alt="Dog Icon" class="show-img">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0006_underweight-selected.webp" alt="Dog Icon" class="selected-img">
                                                </div>
                                                <div class="inner-count">B</div>
                                            </div>
                                            <div class="text-box">
                                                <h4>Underweight</h4>
                                                <p>Ribs, spine & pelvic bones not visible but easily felt <br>
                                                    Obvious waist <br>
                                                    Ribs can be felt easily</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="boxes">
                                            <input type="radio" id="dog_health_c" value="0" name="dog_health" checked>
                                            <div class="inner-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0009_normal-static.webp" alt="Dog Icon" class="show-img">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0008_normal-selected.webp" alt="Dog Icon" class="selected-img">
                                                </div>
                                                <div class="inner-count">C</div>
                                            </div>
                                            <div class="text-box">
                                                <h4>Normal</h4>
                                                <p>Well proportioned <br>
                                                    Ribs, spine & pelvic bones not visible but easily felt <br>
                                                    Obvious waistline and abdominal tuck</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="boxes">
                                            <input type="radio" id="dog_health_d" value="-1" name="dog_health">
                                            <div class="inner-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0003_overweight-static.webp" alt="Dog Icon" class="show-img">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0002_overweight-selected.webp" alt="Dog Icon" class="selected-img">
                                                </div>
                                                <div class="inner-count">D</div>
                                            </div>
                                            <div class="text-box">
                                                <h4>Overweight</h4>
                                                <p>Ribs, spine & pelvic bones not easily felt <br>
                                                    Waist and abdominal fat pad is distinguishable but not obvious <br>
                                                    Obvious fat deposits covering the spine and base of tail</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cols">
                                        <div class="boxes">
                                            <input type="radio" id="dog_health_e" value="-1.8" name="dog_health">
                                            <div class="inner-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0000_very-overweight-static.webp" alt="Dog Icon" class="show-img">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator/cal_0001_very-overweight-selected.webp" alt="Dog Icon" class="selected-img">
                                                </div>
                                                <div class="inner-count">E</div>
                                            </div>
                                            <div class="text-box">
                                                <h4>Very Overweight</h4>
                                                <p>Ribs, spine & pelvic bones not easily felt with excess fat covering <br>
                                                    Waist not visible due to excess fat <br>
                                                    Obvious rounding of abdomen with excessive fat pad and fat deposits on base of tail</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cols-5">
                                <div class="form-group suggested_ideal_weight_wrapper">
                                    <label>Our suggested ideal weight</label>
                                    <input type="text" name="suggested_ideal_weight" id="suggested_ideal_weight" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>How much exercise does your dog get per day?</label>
                                    <select class="form-input" id="dog_excercise" name="dog_excercise">
                                        <option value="1.4">Low (less than 1 hour)</option>
                                        <option value="1.6">Medium (1-3 hours)</option>
                                        <option value="1.8">High (3-6 hours)</option>
                                        <option value="2">Working dog (more than 6 hours)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item hide_div">
                <div class="custom-row">
                    <div class="cols-6">
                        <div class="content">
                            <div class="item-count">4</div>
                            <div class="disclaimer-box">
                                <h4>Disclaimer</h4>
                                <p>Our calorie calculator is intended as a guide to your dogs energy requirements only. Every dog is different and if you have any concerns you should contact your vet.</p>
                            </div>
                            <div class="button text-center">
                                <input type="button" class="calculate" value="Results">
                            </div>
                            <div class="results_block"></div>
                            <div class="products_block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container-indent calc-section product_box_wrapper"></div>
<?php
endif;    
?>
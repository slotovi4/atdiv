function recalculate_price(){var t=parseInt($(".p-constructor-sofa-price").val()),e=parseInt($(".p-constructor-filler-price").val()),i=parseInt($(".p-constructor-carcass-price").val()),s=parseInt($(".p-constructor-casing-price").val()),n=$(".p-constructor-sofa-length").val(),o=t;e&&!isNaN(e)&&(o+=e),i&&!isNaN(i)&&(o+=i),s&&!isNaN(s)&&(o+=s*(n/100)),$(".p-constructor-total-price").val(o),$(".p-constructor-total").text(o)}$(document).ready(function(){$(".p-home-about-us-lb").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile mfp-no-margins mfp-with-zoom",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.',titleSrc:function(t){return t.el.attr("title")+"<small>At-div превью</small>"}},zoom:{enabled:!0,duration:300}})}),$(document).ready(function(){$(".p-last-work-order__button").magnificPopup({type:"inline",preloader:!1,focus:"#name",callbacks:{beforeOpen:function(){$(window).width()<700?this.st.focus=!1:this.st.focus="#name"}}})}),$(document).ready(function(){var t=$(".p-constructor-sofa-name-field").val(),e=$(".p-constructor-sofa-price-field").val(),i=$(".p-constructor-sofa-type-field").val();$(".p-constructor-sofa-name").val(t),$(".p-constructor-sofa-price").val(e),$(".p-constructor-sofa-type").val(i)}),$(document).ready(function(){function t(t){var e=$(t).length,s=120;for(i=0;i<e;i++){var n=2/e*i*Math.PI,o=s*Math.sin(n)+"px",r=s*Math.cos(n)+"px";$(t).eq(i).css({top:r,left:o})}}t(".p-constructor-sofa-property-unit-carcass"),t(".p-constructor-sofa-property-unit-filler")}),$(document).ready(function(){$(".header-mobile-nav__title").on("click",function(){$(".header-mobile-nav__ul").hasClass("header-mobile-nav__ul_active")?$(".header-mobile-nav__ul").fadeOut(500).removeClass("header-mobile-nav__ul_active"):$(".header-mobile-nav__ul").fadeIn(500).addClass("header-mobile-nav__ul_active")})}),$(document).ready(function(){$(".p-home-slider").slick({slidesToShow:1,arrows:!1,dots:!0,appendDots:".p-home-slider-control",dotsClass:"p-home-slider-control-button",autoplay:!0,autoplaySpeed:5e3,fade:!0,cssEase:"linear",speed:500}),$(".p-last-work-slider").slick({slidesToShow:1,arrows:!1,dots:!0,appendDots:".p-last-work-control",dotsClass:"p-last-work-control__button",autoplay:!0,autoplaySpeed:5e3,fade:!0,cssEase:"linear",speed:500})}),$(document).ready(function(){$(".p-constructor-sofa-property-unit-category").on("click",function(){var t=$(this).data("category-id");$(".p-constructor-sofa-modal").fadeIn(300),$(".p-constructor-sofa-modal-section").each(function(){$(this).addClass("b-hide")}),$(".p-constructor-sofa-modal-section[data-category-id="+t+"]").removeClass("b-hide")})}),$(document).ready(function(){$(".p-constructor-sofa-modal__close-button").on("click",function(){$(".p-constructor-sofa-modal").fadeOut(300),$(".p-constructor-sofa-modal-info").addClass("b-hide")})}),$(document).ready(function(){$(".p-constructor-sofa-modal__button").on("click",function(){var t=$(this).data("carcass-id");$(".p-constructor-sofa-modal-info").removeClass("b-hide"),$(".p-constructor-carcass-info").each(function(){$(this).hasClass("b-hide")||$(this).addClass("b-hide")}),$(".p-constructor-carcass-info[data-carcass-id="+t+"]").removeClass("b-hide")})}),$(document).ready(function(){$(".p-constructor-casing-modal__hide-button").on("click",function(){"true"!=$(this).data("active")?($(this).data("active","true"),$(".p-constructor-casing-modal__hide-button-icon").addClass("p-constructor-casing-modal__hide-button-icon_active"),$(".p-constructor-casing-modal-header").fadeOut(300),$(".p-constructor-casing-modal-filter").fadeOut(300),$(".p-constructor-casing-modal-list").fadeOut(300),$(".p-constructor-casing-modal-info").fadeOut(300),$(".p-constructor-casing-modal").animate({width:"10px"},300)):($(this).data("active","false"),$(".p-constructor-casing-modal__hide-button-icon").removeClass("p-constructor-casing-modal__hide-button-icon_active"),$(".p-constructor-casing-modal-header").fadeIn(300),$(".p-constructor-casing-modal-filter").fadeIn(300),$(".p-constructor-casing-modal-list").fadeIn(300),$(".p-constructor-casing-modal-info").fadeIn(300),$(".p-constructor-casing-modal").animate({width:"100%"},300))})}),$(document).ready(function(){$(".p-constructor-casing-modal-list__image").on("click",function(){var t=$(this).data("casing-id");$(".p-constructor-casing-modal-info-section").each(function(){$(this).data("casing-id")==t?$(this).fadeIn(300):$(this).fadeOut(300)})})}),$(document).ready(function(){$(".p-constructor-casing-modal-info__button").on("click",function(){$(".p-constructor-casing-modal__hide-button").data("active","true"),$(".p-constructor-casing-modal__hide-button-icon").addClass("p-constructor-casing-modal__hide-button-icon_active"),$(".p-constructor-casing-modal-header").fadeOut(300),$(".p-constructor-casing-modal-filter").fadeOut(300),$(".p-constructor-casing-modal-list").fadeOut(300),$(".p-constructor-casing-modal-info").fadeOut(300),$(".p-constructor-casing-modal").animate({width:"10px",marginLeft:"-40px"},300);var t=$(this).data("casing-id"),e=new Date,i=e.getFullYear(),s=$(".p-constructor-sofa-image").data("image-title"),n=$(".p-constructor-sofa-image").data("baseurl");$(".p-constructor-sofa-image").css("background-image","url("+n+"/"+i+"/"+s+"/"+s+"-"+t+".png)"),$(".p-constructor-casing-modal-list__image").each(function(){if($(this).data("casing-id")==t){var e=$(this).data("casing-price"),i=$(this).data("casing-density"),s=$(this).data("casing-category"),n=$(this).data("casing-pattern"),o=$(this).data("casing-color"),r=$(this).data("category-name"),a=$(this).css("background-image");$(".p-constructor-order-sofa-casing__type").text(r),$(".p-constructor-order-sofa-casing__price").text(e),$(".p-constructor-order-sofa-casing__density").text(i),$(".p-constructor-order-sofa-casing__category").text(s),$(".p-constructor-order-sofa-casing__pattern").text(n),$(".p-constructor-order-sofa-casing__color").text(o),$(".p-constructor-order-sofa-casing__image").css("background-image",a),$(".p-constructor-casing-price").val(e),$(".p-constructor-casing-id").val(t),recalculate_price()}}),$(".p-constructor-control-ordering").addClass("p-constructor-control_active"),$(".p-constructor-lock__casing-unlock").addClass("p-constructor-lock__icon_hide"),$(".p-constructor-lock__ordering-lock").addClass("p-constructor-lock__icon_hide"),$(".p-constructor-lock__ordering-unlock").removeClass("p-constructor-lock__icon_hide"),$(".p-constructor-lock__casing-check").removeClass("p-constructor-lock__icon_hide")})}),$(document).ready(function(){$(".p-constructor-control-casing").on("click",function(){var t=$(".p-constructor-order__carcass").data("selected"),e=$(".p-constructor-order__filler").data("selected");"true"==t&&"true"==e&&($(".p-constructor-sofa-property__carcass").fadeOut(300),$(".p-constructor-sofa-property__filler").fadeOut(300),$(".p-constructor-sofa-dimension").fadeOut(300,function(){$(".p-constructor-sofa-image").css("margin-top","50px")}),$(".p-constructor-casing-modal").fadeIn(300),$(".p-constructor-lock__parameter-unlock").addClass("p-constructor-lock__icon_hide"),$(".p-constructor-lock__parameter-check").removeClass("p-constructor-lock__icon_hide"),$(".p-constructor-header__number_current").text("04"))})}),$(document).ready(function(){$(".p-constructor-control-model").on("click",function(){$(".p-constructor-info-section").animate({"margin-left":"-100%",opacity:"0"},300,function(){$(this).hasClass("b-hide")||($(".p-constructor-info-section").addClass("b-hide"),$(".p-constructor-catalog-section").removeClass("b-hide").animate({"margin-left":"0",opacity:"1"},300),$(".p-constructor-header__number_current").text("02"))})})}),$(document).ready(function(){$(".p-constructor-control-ordering").on("click",function(){$(this).hasClass("p-constructor-control_active")&&("true"!=$(this).data("click")&&($(".p-constructor-order").fadeOut(300,function(){$(".p-constructor-ordering").fadeIn(300)}),$(this).data("click","true")),$(".p-constructor-header__number_current").text("05"),$(".p-constructor-casing-modal").fadeOut(300))})}),$(document).ready(function(){$(".p-constructor-control-parameter").on("click",function(){$(".p-constructor-sofa-property__carcass").fadeIn(300),$(".p-constructor-sofa-property__filler").fadeIn(300),$(".p-constructor-sofa-image").css("margin-top","0px"),$(".p-constructor-sofa-dimension").fadeIn(300),$(".p-constructor-casing-modal").fadeOut(300),$(".p-constructor-header__number_current").text("03")})}),$(document).ready(function(){$(".p-constructor-sofa-dimension__button").on("click",function(){if("true"!=$(this).data("click"))$(this).val("Применить"),$(this).data("click","true"),$(this).addClass("p-constructor-sofa-dimension__button_active"),$(".p-constructor-sofa-dimension__input-length").prop("disabled",!1).addClass("p-constructor-sofa-dimension__input_active"),$(".p-constructor-sofa-dimension__input-width").prop("disabled",!1).addClass("p-constructor-sofa-dimension__input_active"),$(".p-constructor-sofa-dimension__input-height").prop("disabled",!1).addClass("p-constructor-sofa-dimension__input_active");else{var t=$(".p-constructor-sofa-dimension__input-old-length").val(),e=$(".p-constructor-sofa-dimension__input-old-width").val(),i=$(".p-constructor-sofa-dimension__input-old-height").val(),s=$(".p-constructor-sofa-dimension__input-length").val(),n=$(".p-constructor-sofa-dimension__input-width").val(),o=$(".p-constructor-sofa-dimension__input-height").val(),r=Math.abs(t-s),a=Math.abs(e-n),l=Math.abs(i-o),c=!1;r>=30&&($(".p-constructor-sofa-dimension__input-length").addClass("p-constructor-sofa-dimension__input_error"),$(".p-constructor-sofa-dimension__input-length").val(t),c=!0),a>=30&&($(".p-constructor-sofa-dimension__input-width").addClass("p-constructor-sofa-dimension__input_error"),$(".p-constructor-sofa-dimension__input-width").val(e),c=!0),l>=30&&($(".p-constructor-sofa-dimension__input-height").addClass("p-constructor-sofa-dimension__input_error"),o=$(".p-constructor-sofa-dimension__input-height").val(i),c=!0),c?($(".p-constructor-sofa-dimension__error").text("Разница более 30см!"),$(".p-constructor-sofa-dimension__error").removeClass("b-hide")):($(this).val("Изменить"),$(this).data("click","false"),$(this).removeClass("p-constructor-sofa-dimension__button_active"),$(".p-constructor-sofa-dimension__error").addClass("b-hide").text(""),$(".p-constructor-sofa-dimension__input").each(function(){$(this).prop("disabled",!0).removeClass("p-constructor-sofa-dimension__input_active").removeClass("p-constructor-sofa-dimension__input_error")}),$(".p-constructor-order__value-length").text(s+" см"),$(".p-constructor-order__value-width").text(n+" см"),$(".p-constructor-order__value-height").text(o+" см"))}})}),$(document).ready(function(){$(".p-constructor-casing-modal-header__title").on("click",function(){$(".p-constructor-casing-modal-header__title").each(function(){$(this).removeClass("p-constructor-casing-modal-header__title_selected")}),$(this).addClass("p-constructor-casing-modal-header__title_selected");var t=$(this).data("category-id");$(".p-constructor-casing-modal-list__image").each(function(){$(this).data("category-id")!=t&&-1!=t?($(this).css("display","none"),$(this).addClass("b-hide")):($(this).css("display","inline-block"),$(this).removeClass("b-hide")),$(".p-constructor-casing-modal-info-section").each(function(){$(this).fadeOut(300)})})})}),$(document).ready(function(){$(".p-constructor-casing-modal-filter__button").on("click",function(){var t=$(".p-constructor-casing-modal-filter__min-price").val(),e=$(".p-constructor-casing-modal-filter__max-price").val(),i=$(".p-constructor-casing-modal-filter__min-density").val(),s=$(".p-constructor-casing-modal-filter__max-density").val(),n=$(".p-constructor-casing-modal-filter__category").val(),o=$(".p-constructor-casing-modal-filter__pattern").val();$(".p-constructor-casing-modal-list__image").each(function(){var r=$(this).data("casing-price"),a=$(this).data("casing-density"),l=$(this).data("casing-category"),c=$(this).data("casing-pattern");new_category=n,new_pattern=o,"Все"==new_category&&(new_category=l),"Все"==new_pattern&&(new_pattern=c),$(this).hasClass("b-hide")||(r>e||r<t||a>s||a<i||l!=new_category||c!=new_pattern?($(this).css("display","none"),$(".p-constructor-casing-modal-info-section").each(function(){$(this).fadeOut(300)})):$(this).css("display","inline-block"))})})}),$(document).ready(function(){$(".p-constructor-catalog-category-list__title").on("click",function(){$(".p-constructor-catalog-category-list__title").each(function(){$(this).removeClass("p-constructor-catalog-category-list__title_selected")}),$(this).addClass("p-constructor-catalog-category-list__title_selected");var t=$(this).data("sofa-category");$(".p-constructor-catalog-sofas-list-sofa").each(function(){$(this).data("sofa-category")!=t&&-1!=t?$(this).addClass("b-hide"):$(this).removeClass("b-hide")})})}),$(document).ready(function(){$(".p-constructor-sofa-modal__selected-carcass").on("click",function(){var t=$(this).data("background-image"),e=$(this).data("price");$(".p-constructor-order__carcass").css("background-image","url("+t+")").data("selected","true"),$(".p-constructor-order__carcass-price").text(e).append(' <i class="fa fa-rub" aria-hidden="true"></i>'),$(".p-constructor-sofa-modal").fadeOut(300),$(".p-constructor-sofa-modal-info").addClass("b-hide"),$(".p-constructor-carcass-price").val(e),recalculate_price();var i=$(".p-constructor-order__carcass").data("selected"),s=$(".p-constructor-order__filler").data("selected");"true"!=i||"true"!=s||$(".p-constructor-control-casing").hasClass("p-constructor-control_active")||($(".p-constructor-control-casing").addClass("p-constructor-control_active"),$(".p-constructor-lock__casing-lock").addClass("p-constructor-lock__icon_hide"),$(".p-constructor-lock__casing-unlock").removeClass("p-constructor-lock__icon_hide"))})}),$(document).ready(function(){var t=$(".p-constructor-sofa-dimension__input-length").val(),e=$(".p-constructor-sofa-dimension__input-width").val(),i=$(".p-constructor-sofa-dimension__input-height").val();$(".p-constructor-sofa-length").val(t),$(".p-constructor-sofa-width").val(e),$(".p-constructor-sofa-height").val(i)}),$(document).ready(function(){$(".p-constructor-sofa-property-unit-filler").on("click",function(){var t=$(this).data("background-image"),e=$(this).data("price");$(".p-constructor-order__filler").css("background-image","url("+t+")").data("selected","true"),$(".p-constructor-order__filler-price").text(e).append(' <i class="fa fa-rub" aria-hidden="true"></i>'),$(".p-constructor-sofa-modal").fadeOut(300),$(".p-constructor-sofa-modal-info").addClass("b-hide"),$(".p-constructor-filler-price").val(e),recalculate_price();var i=$(".p-constructor-order__carcass").data("selected"),s=$(".p-constructor-order__filler").data("selected");"true"!=i||"true"!=s||$(".p-constructor-control-casing").hasClass("p-constructor-control_active")||($(".p-constructor-control-casing").addClass("p-constructor-control_active"),$(".p-constructor-lock__casing-lock").addClass("p-constructor-lock__icon_hide"),$(".p-constructor-lock__casing-unlock").removeClass("p-constructor-lock__icon_hide"))})}),$(document).ready(function(){$(".p-constructor-ordering__hide-button").on("click",function(){"true"!=$(this).data("active")?($(this).data("active","true"),$(".p-constructor-ordering__hide-button-first-icon").fadeOut(0,function(){$(".p-constructor-ordering__hide-button-second-icon").fadeIn(300)}),$(".p-constructor-ordering-form").fadeOut(300),$(".p-constructor-order").fadeIn(300)):($(this).data("active","false"),$(".p-constructor-ordering__hide-button-second-icon").fadeOut(0,function(){$(".p-constructor-ordering__hide-button-first-icon").fadeIn(300)}),$(".p-constructor-order").fadeOut(300),$(".p-constructor-ordering-form").fadeIn(300))})}),$(document).ready(function(){$(function(){var t=parseInt($(".p-constructor-casing-modal-filter__min-density").val()),e=parseInt($(".p-constructor-casing-modal-filter__max-density").val());$(".p-constructor-casing-modal-filter__density").val(t+" - "+e+" гр/м2"),$(".p-constructor-casing-modal-filter__density-range").slider({range:!0,min:t,max:e,values:[t,e],slide:function(t,e){$(".p-constructor-casing-modal-filter__density").val(e.values[0]+" - "+e.values[1]+" гр/м2"),$(".p-constructor-casing-modal-filter__min-density").val(e.values[0]),$(".p-constructor-casing-modal-filter__max-density").val(e.values[1])}})})}),$(document).ready(function(){$(function(){var t=parseInt($(".p-constructor-casing-modal-filter__min-price").val()),e=parseInt($(".p-constructor-casing-modal-filter__max-price").val());$(".p-constructor-casing-modal-filter__price").val(t+" - "+e+" р"),$(".p-constructor-casing-modal-filter__price-range").slider({range:!0,min:t,max:e,values:[t,e],slide:function(t,e){$(".p-constructor-casing-modal-filter__price").val(e.values[0]+" - "+e.values[1]+" р"),$(".p-constructor-casing-modal-filter__min-price").val(e.values[0]),$(".p-constructor-casing-modal-filter__max-price").val(e.values[1])}})})}),$(document).ready(function(){$(".b-sofa__button").on("click",function(){var t=$(this).data("open-block");"true"==$(this).data("click")?($(t).fadeOut(300),$(this).data("click","false")):($(t).fadeIn(300),$(this).data("click","true"))})});
$(function(){
    $(document).ready(function(){

        let index = 0;
        const testimonials = $(".testimonial");
        const total = testimonials.length;

        for (let i = 0; i < total; i++) {
            $(".dots-container").append(`<span class="dot" data-index="${i}"></span>`);
        }

        function updateSlider() {
            $(".testimonial-slider").css("transform", `translateX(-${index * 50}%)`);
            $(".dot").removeClass("active");
            $(".dot").eq(index).addClass("active");
        }

        $("#next").click(function() {
            index = (index + 1) % total; 
            updateSlider();
        });

        $("#prev").click(function() {
            index = (index - 1 + total) % total; 
            updateSlider();
        });

        $(".dot").click(function() {
            index = $(this).data("index");
            updateSlider();
        });

        updateSlider();
        
        let testimonialMaxHeight = 0;

        $('.testimoial-container').each(function(){
            if($(this).height() > testimonialMaxHeight)
            {
                testimonialMaxHeight = $(this).height();
            }
        });
        
        $('.testimoial-container').height(testimonialMaxHeight);
    });

});
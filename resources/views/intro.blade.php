@extends('common')

@section('title', 'Eating Disorder: Be Aware')

@section('content')
<div id='introGraph'>
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    </div>

    <div id = "p1_img" style = "text-align: center; margin-top: 3%;">
        <img src="{{ asset('images/ill.gif') }}" alt="Example Image" style="width: 100%; height: auto; border-radius: 10px;">
    </div>
    <br>

    <p>
        An eating disorder is a mental disorder defined by abnormal eating behaviors that negatively affect
        a person's physical or mental health.
    </p>
    <p>Types of eating disorders include:</p>
    <ul>
        <li><strong>Binge Eating Disorder:</strong> where the patient eats a large amount in a short period of
            time;</li>
        <li><strong>Anorexia Nervosa:</strong> where the person has an intense fear of gaining weight and restricts
            food or overexercises to manage this fear;</li>
        <li><strong>Bulimia Nervosa:</strong> where individuals eat a large quantity (binging) then try to rid
            themselves of the food (purging);</li>
        <li><strong>Pica:</strong> where the patient eats non-food items;</li>
        <li><strong>Rumination Syndrome:</strong> where the patient regurgitates undigested or minimally digested
            food;</li>
        <li><strong>Avoidant/Restrictive Food Intake Disorder (ARFID):</strong> where people have a reduced or
            selective food intake due to some psychological reasons;</li>
    </ul>
    <p>Anxiety disorders, depression, and substance abuse are common among people with eating disorders.</p>

    <h2>Some Facts</h2>
    <p>
        Teen eating disorder facts aren’t always easy to find. There are many different types of eating disorders,
        and there are many different opinions about what causes them and how to treat them.
    </p>

    <p>
        What is not disputed is that eating disorders are extremely common. According to the National Eating
        Disorder Association (NEDA), 20 million women and 10 million men suffer from an eating disorder at some
        time in their life.
    </p>

    <p>
        Eating disorder statistics over the past century show the frightening growth of this mental illness. The
        incidence of eating disorders has been steadily increasing since 1950, NEDA reports. This includes eating
        disorders among adolescents. Each decade since 1930, the number of anorexia nervosa cases among young women
        ages 15 to 19 has increased. In addition, the incidence of bulimia in women between the ages of 10 and 39
        tripled between 1988 and 1993.
    </p>

    <p>
        Eating disorders disproportionately affect teens: These disorders are most prevalent in those between the
        ages of 12 and 25. Eating disorders in children under 12 are also a danger, however. Because their bodies
        are smaller, weight loss caused by refusing to eat can create significant health issues quickly.
    </p>

    <div id = "p1_img" style = "text-align: center; margin-top: 5%;">
        <img src="{{ asset('images/p1_illus_2.jpg') }}" alt="Example Image" style="width: 50%; height: auto; margin">
    </div>
    <br>

    <h2>Some Stats</h2>
    <ul>
        <li>An estimated 9% of the U.S. population, or 28.8 million Americans, will have an eating disorder in
            their lifetime.</li>
        <li>15% of women will suffer from an eating disorder by their 40s or 50s, but only 27% receive any
            treatment for it.</li>
        <li>Fewer than 6% of people with eating disorders are medically diagnosed as “underweight.” 7, 16. In fact,
            people in larger bodies are at the highest risk of having developed an eating disorder in their lives,
            and among people in larger bodies, the higher the BMI, the higher the risk.</li>
        <li>In a sample from an American emergency room, 16% of adult patients screened positive for an eating
            disorder.</li>
        <li>Eating disorders have the second-highest case mortality rate of any mental illness.</li>
        <li>Eating disorder sufferers with the highest symptom severity are 11 times more likely to attempt suicide
            than their peers without eating disorder symptoms, and even those with sub-threshold symptoms are 2 times
            more likely. 60 Patients with anorexia have a risk of suicide 18 times higher than those without an
            eating disorder.</li>
        <li>The economic cost of eating disorders is $64.7 billion every year.</li>
    </ul>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('register') }}" class="btn btn-primary">Register Now</a>
    </div>

</div>

@endsection

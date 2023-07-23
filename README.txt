
About the code:

    Following are the points which I think will make it a more bug free, readable, optimized and amazing code.

1) try/catch:

        In all functions try catch is missing. Adding try catch will make it more efficient code. Moreover,
    we can also keep track of the errors by saving error logs to database and for real time notifications add
    slack notifications. In this way we will be notified about the errors any user face and resolve them timely.

2) Function type:

        Some functions are used within the same class but are declared public, which is not a good approach. We 
    should define such functions as private so that they can only be accessible where needed.

3) Query optimization:

        I have noticed some queries where all the record is being fetched from database. Later on, while looping
    over the records, where conditions are applied which should be used when record is initially fetched from
    database so that query can be be optimized and looping time can be minimized. Example: sendNotificationTranslator
    function.

4) Redundant Code: 

        In some functions like acceptJob, acceptJobWithId etc some part of code is duplicated. Despite of writing 
    same code again and againg in different functions we can simply make a a helper function and use it where needed.

5) Multiple If/elseif statements:

        I have seen multiple functions where various if/elseif conditions are used and we know that only one condition need to
    be excetued at once. So the better aproach is to use switch statements.

6) Single use varibales:

        Mostly in some function,s variables are declared for only single time use. So the better approach is not to define
    such varibales and allocate memory, despite we should use them directly and pass them as a parameter where needed.

7) Extra Parameters to functions:

        There are some functions in the code where the whole request data array is passed and then single request paramater is
    again passed as a second paramater to the function. We can access that single parameter from the whole request data array and
    reduce the number of extra and uncessary parameters from the function.

8) Custom Request Classes:

        In the code, I have found that default request classes are used without any validations on the request data. We should 
    make our own request classes so that proper validations like: required, unique, exists or regex can be applied on the request 
    data. Moreover, we can also customize the error messages based on the failed validations.

9) Removing extra keys from request:

        By creating our own request class we can also prepare data in our own way and remove extra keys from request and secure
    the sensitive data.

10) Helper function for success/failure function:

        We should make our success and failure response functions. I have seen in mostly all functions that direct responses are 
    retured with no status codes. So, atleast status code should be retured with data so that proper validations on frontend should 
    be added to dispaly the success or errro messages.

11) Model constants:

        In varoius functions, checks on job status i.e assigned, pending or completed etc are used. So despite writing those strings
    again and again which may lead to any spelling mistake, we should simple define a constant in job model or any other model and use 
    them later where needed.

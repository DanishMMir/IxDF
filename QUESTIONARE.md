
# IxDF questionnaire answered

***1. Please describe an interest, favorite activity, or hobby of yours. It could be anything: just something you enjoy doing. For this particular answer, please only write up to 60 words and do it in a way that captivates your readers (us!).***

Answer: I love to build upon ideas particularly involving software and ***Do It Yourself*** stuff. I am very much into DIY and enjoy tearing down, modifying and building things. I think this helps me brush upon my logical and imaginative cognition. I am considering to build a mini workshop at home to continue my passion for it.

***2. What is most important to you when you look for a new job? Please be completely honest and transparent about your situation and season of life; we’re not looking for “the right answer”. The more you tell us, the better we can align.***

Answer: I am a learner. I love to take on new stuff and discover unchartered territories. It helps me to build and expand on my skills while at the same time acheive something meaningful and of value. It also helps me to binge on the work and simultaneously enjoy it. So, the most important thing that i look for into a new job is that if the job provides enough opportunities to learn an grow as a professional and the impact in terms of value my work produces. That being said, i also love to have a degree of work-life balance as i enjoy spending time with my family and little one.

***3. Everyone learns differently. How do you learn best? And what’s something new that you’ve learned in the past few months? Big or small, we’re curious!***

Answer: I best learn by doing things. That helps me improve upon my processes as i iterate over it. It also helps me remember things well as i have gone through the implementation. Recently we have gone through an infrastructure migration for our product which i was heading from our team's side. During that process i have learned a ton of new things in AWS resources which i had no experience with previously.

***4. How did you hear about this open position?***

Answer: I came to know about the position from a LinkedIn email about my job recommendations.

***5. Show us some examples of concrete work you’re proud of having done yourself. Please tell us why you are proud of what you sent us. Please be as specific as possible.***

Answer:  In my current organisation there are mulltiple products made with Laravel some of which are monoliths and others as microservices with different teams working on different products. There were no standards in place for any styling, static analysis, unit-test checks. There was some outdated confluence documentation which recommended a few outdated tools but it was not enforcing and most of the members didn't even knew the document existed. So, in one of the refinements,  i pitched an enhancement to have a set of standards which are enforcing and at the same time common to the different teams. But the challenge was how to keep the standards consistent across multiple libraries owned by multiple teams. So i created a Laravel package with all the tools and configurations setup. The teams just needed to require the package in their respective repositories. Once installed as a dev-dependency it automatically published all the assets, registered commands/aliases and configurations in the respective project. Including this dependency meant that the code will be checked at multiple stages against the defined configurations so one can make sure that only quuality and compliant code is being pushed into production. This also meant that all the Laravel based products were now using the same set of rules and configurations for quality and standards checks.  
I am proud of the implementation because it solved the problem without creating any extra maintenance workload and was something that became part of every Laravel repo in the company.
Here is a snapshot of the library opened in my IDE with one of the configuration files opened.  
![Snapshot of the coding standard library](#)

***6. Can you give a concrete example of a recent situation where you “took ownership” of a task/project/etc at work and made something truly positive happen? How do you define “taking ownership” of your work?***

Answer: A couple of months back we took on a project of migrating our cloud infrastructure from a single EC2 instance inside an AWS account handling all of the things to a fully scalable AWS architecture. I was heading it from my team's side collaborating with the cloud operations team. We had a live product being used by multiple clients for their business routines, so the desired downtime was minimal with zero post migration issues. It was a huge task and for me a very challenging and learning experience which i greatly enjoyed and loved as i learned a ton of stuff executing this project. A lot of moving parts were involved with this project and the stakes were very high. We had to make sure everything works even after migration. We started with a POC on a new sandbox account to check if the new architecture was feasible with our product and the amount of resource we had estimated.  
We did a lot of stuff to get to the finish line e.g. Changed our deployments from Forge to Github Actions, Changed our storage to S3 instead of on server, Changed our sessions to Database instead of file, Changed our queing startegies, email strrategies, Cron strategies, server configuration strategies, SFTP upload strategies, Database storage strategies, routing strategies, a heck lot of meetings, runbooks, etc.  
After a few months tremendous work with all of these inprovements and clooaboration with other teams, we successfully migrated from a single EC2 instance (handling Server, Database, Queues, Email, Routing, SSL, Crons, etc.) with no scaling ability to a completely autoscaling solution with Beanstalk (Beanstalk, Aurora, ACM, S3, SES, SQS, ASM, EFS, Transfer Family, LoadBalancers, CloudFront, etc.) with a maximum of 1 and a half hour off peak hours downtime with no post migration issues.  
That was one of the few tasks where i completely took ownership of a part of a big project and I beleive taking ownership of something is like committing to something for which you will reap the benifits of success or face the consquences of failure. You have all the tools processes and resources at disposal and you need to make sure that you create a recipe out of these that works for you and the project.

***7. What are the key skills you (would) bring to an asynchronous and remote work environment? What key skills do you feel you need to improve for you to fully thrive in such an environment?***

Answer: I have been working remotely for around 5 years now and i feel very comfortable working in a remote setting. To succeed in an asynchronous and remote work environment, i think my passion towards engineering, good communication skills, fluency in english, clarity of thought process, eagerness to learn and help, quickness in responding, sapcious and silent work environment and flexible time schedule has and will help me a lot.  
I think i need to improve on doing less context switching, more deep work sessions to further increase my productivity.

***8. Which season of life are you currently in and what are your career goals? For example, are you in a season of life where you work long hours to learn as much as possible? Or in a season where you prioritize work-life balance because you’ve already gained substantial experience? The more transparency you give us, the better we can align and create common goals for your career.***

Answer: I think i might be in-between "working long hours to learn" and "prioritising work-life balance", slightly inclining towards "long work hours". I love to solve problems and work on intresting issues and tasks which sometimes makes me forget the clock and time. However, i also love to play and spend time with my son and family. His curiosity about things amazes me.  
My career goal is to thrive as an engineer continuing the ladder of engineering and architecture. I am not a fan of full management career but engineering management might also be a thing for me. My ultimate goal is to build and be part of something that provides value to masses and i could be proud of, doesn't matter how much it requires.

***9. What is your approach to monitoring the performance of live web applications? What techniques do you use to maintain good performance levels?***

Answer: I have used multiple monitoring tools like Sentry, New Relic, Grafana apart from AWS monitoring solutions. All of these tools are capable in their own spaces. We have them as part of our current products as well. However, i prefer a tool, that is easy to use and configure and provides well layed-out reports in a central place for all of the monitoring requirements.  
I prefer to use a good monitoring tool with proper alerting setup for proper channels for any issues/peaks in the defined threshold criteria. In my opinion the sooner you catch an issue, the sooner you can fix it, and the less damage it can cause.

***10. Could you please send us a sample of some production code you have written and are particularly proud of or find intriguing? Please also explain why you are proud of this code or why you find it interesting. I understand that you are likely under an NDA for some of your code, so it doesn't need to be executable.***

Answer: As part of the AWS migration mentioned above, we had a challenge of dealing with background cron jobs. In earlier setup, there was a single server instance and running cron jobs was straightforward with a simple crontab and laravel scheduler. But in the new architecture, as there were multiple server instances with same codebase behind a loadbalancer, running cron jobs in traditional way was not possible as it would have created duplications and race conditions when multiple instances would have triggered same jobs multiple times.  
We also did not want to increase costs with a separate worker instance specifically for backgrouund cron jobs, so we had to come up with a solution that solved the problem without incurring extra infrastructure costs.  
[Here](#) in this file you can find the solution that i implemented for the problem, which essentially looks for first instance in an autoscaling group and then only marks that instance eligible to run cron jobs while ignoring other instances. There are a few improvements that can be made to this script. One that comes to my mind is that if a longer cronjob is running, and the instance is marked for termination by auto scaling group, what happens in that case. Currently it is not handeled and can be handeled by tagging the instance for deletion only after the cron job completes execution.  
I am proud of this because it was the first time i fully worked in bash scripting and it was also an itriguing solution for an intriguing problem.

Another example is a particular route in our application that fetches all of the packages that are eligible to be showen and used. We did an exercise of improving the codebase and simultaneously optimising the application for low resource usage and quick response times. I also headed this initative and proposed a modular custom structure inside the Laravel directory structure because of the complexity of the code. The proposed solution had all the required components for a particular module in that module's directory only, including, views, routes, controllers, models, etc.  
As a POC for this initative i took a single route and created a mirror of the route in the new proposed modular structure.  
Here is the [old version](#) implementation of the route.  
Here is the [new version](#) implementation of the route.  

The difference in resource usage was tremendous, as the new implementation reduced the duplicated querying by half. The response time was improved by 4x because of it.  
I was proud of this implementation because without much effort we could refactor the code and the refactor improved the response times and resource usage quite a lot.

## NOTE:
Both of these examples are a part of our current production environments.  
Some parts of the code has been hidden on purpose for privacy reasons.

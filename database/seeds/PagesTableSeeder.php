<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder {

	use DisableForeignKeys,
	TruncateTable;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->disableForeignKeys();
		$this->truncate(config('module.pages.table'));

		$page = [
			[
				'title'       => 'Terms and conditions',
				'page_slug'   => 'terms-and-conditions',
				'description' => '<div class="col-12 col-md-9 content">

        <p>The following terms and conditions were put together to help users better understand how their use of this website associated with the domain name bootstrapbay.com (the “Website”) will be governed.</p>

        <p>The Website is owned and operated by Conacel Elena-Cristina PFA, an entity registered and functioning according to Romanian laws, with its headquarters in Cândești Village, Cândești commune, Buzău county, Romania, registered with the Trade Registry under no. F10/617/2017, fiscal identification code 38568939 (“Bootstrapbay”).</p><p>

        </p><p>Your use and access of this Website indicates you understand and accept these Terms and Conditions. If you are unsure about the meaning and/or effects of any clause containted in these Terms and Conditions, please <a href="/contact-support" target="_blank">reach out to us</a>.</p>

        <h4> 1. Ownership and Property Rights</h4>

        <p>Using this Website does not grant you any ownership or interest in any content, visual interfaces, graphics, design, compilation, information, computer code, products, software, services and all other elements you may access from the Website.</p>

        <p>You are authorized to download a single copy of purchased content contained on the website for your personal, non-commercial uses, provided that you maintain the copyright and other notices contained in that content. This excludes products available with premium licenses. Please consult our&nbsp;
licenses&nbsp;
page for more information.</p>

        <h4>2. Personal data about you</h4>

        <p>In the course of your use of the Website, you may be asked for personally identifiable information (“Personal Data”) or such data may be collected from you indirectly, while you are using the Website. Our&nbsp;<a href="/privacy" target="_blank">Privacy Policy</a> provides the type of data we collect and process, for what purpose and for how long, as well as who can access such data (including third-parties) and how you can exercise your rights, according to provisions of European personal data laws in force. You are solely responsible for the accuracy and content of this user information. There are different types of personal data that is collected about you, based on your use of the Website as a visitor or a registered user.</p>

        <h4>3. Third Party websites</h4>
        <p>In the course of your use of the Website, you may be re-directed to third party websites. We have no responsibility for the content or information provided by or through third party websites even if they are affiliates of ours.</p>

        <p>Linking to third party websites does not imply our endorsement of that web website. We disclaim any liability for links to another website.</p>

        <h4>4. Creators’ liability</h4>

        <p>The Website may contain content created by third-party designers, contracted by Bootstrapbay for this purpose. If you are such a third-party designer, you are liable to abide by, apart from these Terms and Conditions, the Data Processing Addendum made available by Bootstrapbay to you whenever you have signed an agreement for design creation with Bootstrapbay.</p>

        <h4>5. Limitation of Liability</h4>

        <p>
            You agree to indemnify and hold harmless BootstrapBay and its parent, subsidiaries, affiliates or any related companies, licensors and suppliers, and their respective directors, officers, employees, agents, representatives, and contractors, from all damages, injuries, liabilities, costs, fees and expenses (including, but not limited to, legal and accounting fees) arising from or in any way related to:
            </p><ul class="list-unstyled">
                <li>(i) your use or misuse of the website (including your use or misuse of Third Party Content); </li>
                <li>(ii) your breach or other violation of these Terms including any representations, warranties and covenants herein; </li>
                <li>(iii) your violation of the rights of any other person or entity, including, but not limited to claims that any User Content infringes or violates any third party intellectual property rights.</li>
            </ul>
        <p></p>

        <h4>6. Exclusion of Warranties</h4>

        <p>The BootstrapBay content, or any other product, service or information provided by BootstrapBay, user content, third-party content, and any other software, services or applications made available in conjunction with or through the website, are provided on an "as is", "as available", "with all faults" basis without representations or warranties of any kind, either express, implied, or statutory, including, but not limited to, in terms of correctness, accuracy, reliability, or otherwise.</p>

        <p>To the fullest extent permissible by applicable law, BootstrapBay hereby disclaims all warranties of any kind, either express or implied, including, any warranty of merchantability, fitness for a particular purpose, non-infringement, or arising from a course of dealing, with respect to the products or services provided by BootstrapBay.</p>

        <h4>7. Notices</h4>

        <p>BootstrapBay may provide you with notices by e-mail related to your activity and/or your account. Additionally, you may opt-in to receive a newsletter with updates about new products available in the Website. You can opt-out of our newsletter at any time, by following the steps described in the footer of any e-mail you receive from us as a result of you subscribing to the newsletter.</p>

        <h4>8. Refunds</h4>

        <p>Refunds will only be administered if products are deemed to be faulty or not as described on the product page. To request a refund, please&nbsp;
contact support&nbsp;
and specify exactly what the issue is with the product. The support team will then investigate to determine whether or not the product was faulty and not as described.</p>

        <p>Unfortunately, due to the nature of digital goods, refunds cannot be processed until it has been determined that the product is faulty.</p>

        <h4>9. Governing Law</h4>

        <p>This agreement, and any dispute, controversy, proceedings or claim of whatever nature arising out of or in any way relating to these Terms &amp; Conditions or its formation shall be governed by and construed in accordance with Romanian law.</p>

        <h4>10. Modification of the Terms</h4>

        <p>BootstrapBay reserves the right to update or modify the Terms &amp; Conditions at any time without prior notice, and such changes will be effective immediately upon being posted on the website. These Terms will identify the date of the last update. In the case of material changes to the Terms, BootstrapBay will make reasonable efforts to notify you of the change, such as through sending an email to any address you may have used to register for an account, through a pop-up window on the website, or other similar mechanism.</p>

        <p>These terms were last updated on July 30, 2018.</p>

    </div>',
				'status'     => '1',
				'created_by' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'       => 'Disclaimer',
				'page_slug'   => 'disclaimer',
				'description' => '<p>Disclaimer</p><ol type="a">
    <li>The materials on Bootstrapious website are provided on an as is basis. Bootstrapious makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</li>
    <li>Further, Bootstrapious does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</li>
</ol>',
				'status'     => '1',
				'created_by' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'       => 'Terms of service',
				'page_slug'   => 'terms_of_service',
				'description' => '<p align="justify">Neurofeedback Training (NFT), sometimes referred to as EEG biofeedback, is being offered to me (or my child) as a form of treatment that offers potential benefits in the area of difficulty for which I/we are seeking help.</p>
<p align="justify"><strong>WHAT IS NEUROFEEDBACK TRAINING (NFT)?</strong></p>
<p align="justify">NFT is a non-medical, general training that takes advantage of the brain&rsquo;
s ability to self-regulate. Non-invasive sensors called &lsquo;
electrodes&rsquo;
 are placed on specific sites on the surface of the head using an EEG cap. The sensors enable brain activity patterns to be picked up and displayed on a computer screen. The techniques used to attach the electrodes have been used at clinics and research institutions all over the world for many years and no deleterious side effects have been reported. It is a universally used procedure for the recording of EEG, and a necessary tool for the evaluation of brain function in various parts of the brain. The computer produces feedback about whether brain activity is desirable or not. The feedback allows the brain to learn to produce more efficient patterns more frequently.</p>
<p align="justify">I understand that NFT requires the placement of surface electrodes on my scalp and conductive gel used for the purpose of recording my EEG and uses this signal to provide feedback in the form of video display or games. While there are few risks associated with this procedure, there is a remote possibility of skin irritation from the electrode gel that is used to attach electrodes. I understand that I can ask to have the electrodes removed at any time if I so desire. There is no risk of electric shock from this procedure.</p>
<p align="justify">I have been informed that, although there is a growing research evidence base for the efficacy of NFT, it is still considered an experimental treatment in some contexts. The extent to which any benefits will be obtained or will be long-lasting is not fully proven. NFT often produces very beneficial and lasting changes; however, sometimes this may not be the case. We generally expect a positive response within the first 12 sessions, if there is to be one. If no improvement is achieved in that time, we can then discuss suspending treatment.</p>
<p align="justify">In the majority of cases where there is improvement in function, it then becomes the client&rsquo;s own responsibility to monitor progress and to continue training as long as it is perceived to be of benefit. <strong>While there are often improvements in the first few sessions, NFT usually requires at least 15-20 sessions with a small number of follow-up reinforcement sessions for lasting change to take place.</strong></p>
<p align="justify"><strong>LIMITATIONS OF TRAINING AND POTENTIAL RISKS</strong></p>
<p align="justify">It is important to understand that a NFT assessment is NOT the same as a &ldquo;
clinical EEG&rdquo;
. NFT is not designed, and we do not try, to use it to diagnose medical conditions.</p>
<p align="justify">In terms of the NFT itself, only rarely have significant side effects been reported. Occasionally someone may feel tired, spacey, anxious, experience a headache, have difficulty falling asleep, or feel agitated or irritable. <strong>In some instances, it has been reported that symptoms have gotten worse before they get better. This is to be expected in some cases, and we appreciate your patience as you work through these issues. </strong>Many of these feelings are transient and pass within a short time following the training session. If they do not, you should report this at your next session.</p>
<p align="justify">You may feel an increased need to sleep during the first few weeks of training. This can be due to a variety of factors, but in general is considered to be normal and a sign that the brain is renormalising between sessions. Please make allowances for the increased need to sleep.</p>
<p align="justify"><strong>MEDICATIONS AND CONSULTATION WITH YOUR PHYSICIAN</strong></p>
<p align="justify">NFT may affect medications and/or change the dosage requirements for some medications. Therefore, it is very important that the physician monitoring your medication be made aware that you are using NFT. <strong>Do not stop or alter your medications without consulting with your physician</strong>. I accept that it is my responsibility to inform my GP/other health care provider and Dr. Michael Keane regarding changes in symptoms or development of new symptoms. NFT is not a substitute for effective standard medical treatment.</p>
<p align="justify">NFT can substantially affect your glucose level as your brain works very hard when you train. Please have a meal or snack before coming to appointments, and let us know if you are diabetic or hypoglycaemic. You may find that you are hungry after sessions, so please allow time to have a snack if required. In addition <u><strong>it is very important for us to know if you have or have ever had epileptic seizures</strong></u><strong>.</strong></p>
<p align="justify"><strong>CONFIDENTIALITY</strong></p>
<p align="justify">Information shared in sessions is kept confidential and will not be disclosed without your written permission, except in cases of:</p>
<p align="justify">1) Situations in which you are deemed to be a danger to yourself or others (i.e. threats of homicide or suicide) and</p>
<p align="justify">2) Situations in which children are endangered or have been abused.</p>
<p align="justify"><strong>FEES AND MISSED APPOINTMENTS</strong></p>
<p align="justify">Sessions are typically scheduled for at least once a week, but generally twice a week where possible, and are billed at &euro;
120 per session. Payment is due at time of service. Clients will be charged &euro;
40 for cancellations not made more than 24 hours in advance. Exceptions to this policy will be considered on a case by case basis.</p>
<p align="justify"><strong>VOLUNTARY PARTICIPATION AND CONSENT TO EEG NEUROFEEDBACK</strong></p>
<p align="justify">I voluntarily, knowingly, and willingly give my consent to the use of NFT. I understand the principles set forth here with regard to benefits and risks of NFT, medication effects, expectations as to length of training, policies regarding payment and missed appointments. Furthermore, by signing this form I waive any claim of damages due to NFT, including claimed side effects, or the failure to see changes during training.</p>',
				'status'     => '1',
				'created_by' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'       => 'Research Activity',
				'page_slug'   => 'research',
				'description' => '<p align="justify">At the Actualise Neurofeedback Training Clinic, we may store data for potential future research projects. All data entered into this store is anonymised, so that it cannot be linked to the client from whom the data came. As such, data will never be identifiable &ndash; identity is protected at all times.</p>
<p align="justify">Furthermore, any research projects which we will carry out will be subject to full ethical approval from the Dublin City University Research Ethics Committee.</p>
<p align="justify">If you are happy to have your data included in this data store, please tick the box below and print and sign your name. <strong>Remember, you are under no obligation to do so. Your decision in no way affects the services provided to you at the clinic.</strong></p>
<p align="justify"><br /><br /></p>',
				'status'     => '1',
				'created_by' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'       => 'GDPR',
				'page_slug'   => 'gdpr',
				'description' => '<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Actualise Psychological Services collects and processes sensitive, healthcare related personal data on the basis of your explicit consent, and in order to form an opinion about, and/or to diagnose your presenting condition. Your personal data will not be used for any other purpose. </span></span></p>
<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Your data will be processed in a fair manner and retained by Actualise Psychological Services for a period of 7 years after your last attendance. &nbsp;
Your data will be stored securely and protected during this time as set out in our Data Protection Policy which is available to you if you wish to have it.</span></span></p>
<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Your personal data may be shared with the person who referred you to us, with your family doctor (GP), with a medical consultant or other specialist practitioners. &nbsp;
Other examples of people with whom your data may be shared, subject to your prior agreement, include your Legal Advisors, employers, Insurers, team/club medical staff and management in order to facilitate your return to normal activities. Your data will not be shared with any other third party outside of the Clinic without getting your permission to do so. </span></span></p>
<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">Your data will not be subjected to automated processing by this clinic. &nbsp;
</span></span></p>
<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">You have a number of rights in relation to your personal data held at this clinic. These include</span></span></p>
<ol type="a">
<ul type="a">
<li>the right to request from us<span style="font-family: Calibri, serif;"> access to and rectification or erasure of your personal data,</span></li>
</ul>
</ol>
<ol type="a">
<ul type="a">
<li>the right to restrict processing, object to processing as well as in certain circumstances the right to data portability</li>
</ul>
</ol>
<ol type="a">
<ul type="a">
<li>the right to withdraw your consent for the processing of your data (in certain circumstances) at any time which will not affect the lawfulness of the processing before your consent was withdrawn.</li>
</ul>
</ol>
<ol type="a">
<ul type="a">
<li>the right to lodge a complaint to the Data Commissioner&rsquo;
s Office if you believe that we have not complied with the requirements of the GDPR or DPA&nbsp;
with regard to your personal data.</li>
</ul>
</ol>
<p><span style="color: #000000;"><span style="font-family: Calibri, serif;">The Data Controller and the Data Protection Officer is the Clinic Manager, Dr. Michael Keane</span></span></p>',
				'status'     => '1',
				'created_by' => '1',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]
		];

		DB::table(config('module.pages.table'))->insert($page);

		$this->enableForeignKeys();
	}

}

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 07, 2020 at 11:02 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `io2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_cats`
--

CREATE TABLE `blog_cats` (
  `catID` int(11) UNSIGNED NOT NULL,
  `catTitle` varchar(255) DEFAULT NULL,
  `catSlug` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_cats`
--

INSERT INTO `blog_cats` (`catID`, `catTitle`, `catSlug`) VALUES
(1, 'Healthy eating', 'healthy-eating'),
(2, 'Garden', 'garden'),
(5, 'Fruit', 'fruit'),
(4, 'Allotment', 'allotment'),
(6, 'Lemon Grass', 'lemon-grass');

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE `blog_members` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$kuLhGtD5E4kpmQY6VKxwQ.0hZk4Mi5MKik68AkO9gQWNqjFnmPNkK', 'neilos78@gmail.com'),
(2, 'admin2', '$2y$10$6Iitddk5.5D8zZ5AQLz/be4jpsSDatKLdzERwIqAatB8Vly8J2.NO', 'nerophill@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES
(1, 'Bendless Love', '<p>That\'s right, baby. I ain\'t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him! Interesting. No, wait, the other thing: tedious. Hey, guess what you\'re accessories to. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate.</p>', '<h2>The Mutants Are Revolting</h2>\r\n<p>We don\'t have a brig. And until then, I can never die? We need rest. The spirit is willing, but the flesh is spongy and bruised. And yet you haven\'t said what I told you to say! How can any of us trust you?</p>\r\n<ul>\r\n<li>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat.</li>\r\n<li>Bender?! You stole the atom.</li>\r\n<li>I was having the most wonderful dream. Except you were there, and you were there, and you were there!</li>\r\n</ul>\r\n<h3>The Series Has Landed</h3>\r\n<p>Fry! Stay back! He\'s too powerful! No. We\'re on the top. Fry, you can\'t just sit here in the dark listening to classical music.</p>\r\n<h4>Future Stock</h4>\r\n<p>Does anybody else feel jealous and aroused and worried? We\'re also Santa Claus! You\'re going back for the Countess, aren\'t you? Well, let\'s just dump it in the sewer and say we delivered it.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n<li>I guess if you want children beaten, you have to do it yourself.</li>\r\n<li>Yeah. Give a little credit to our public schools.</li>\r\n</ol>\r\n<h5>The Why of Fry</h5>\r\n<p>Who are you, my warranty?! Shinier than yours, meatbag. Dr. Zoidberg, that doesn\'t make sense. But, okay! Yes, except the Dave Matthews Band doesn\'t rock.</p>', '2013-05-29 00:00:00'),
(2, 'That Darn Katz!', '<p>Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. Fry, you can\'t just sit here in the dark listening to classical music. And yet you haven\'t said what I told you to say! How can any of us trust you?</p>', '<h2>Xmas Story</h2>\r\n<p>It must be wonderful. Does anybody else feel jealous and aroused and worried? Is today\'s hectic lifestyle making you tense and impatient? Soothe us with sweet lies. That\'s right, baby. I ain\'t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him!</p>\r\n<ul>\r\n<li>Goodbye, friends. I never thought I\'d die like this. But I always really hoped.</li>\r\n<li>They\'re like sex, except I\'m having them!</li>\r\n<li>Come, Comrade Bender! We must take to the streets!</li>\r\n</ul>\r\n<h3>Anthology of Interest I</h3>\r\n<p>Hey, whatcha watching? They\'re like sex, except I\'m having them! Well I\'da done better, but it\'s plum hard pleading a case while awaiting trial for that there incompetence. Yes, except the Dave Matthews Band doesn\'t rock. I suppose I could part with \'one\' and still be feared&hellip;</p>\r\n<h4>Teenage Mutant Leela\'s Hurdles</h4>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! It\'s a T. It goes \"tuh\". I guess if you want children beaten, you have to do it yourself.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>Well, thanks to the Internet, I\'m now bored with sex. Is there a place on the web that panders to my lust for violence?</li>\r\n</ol>\r\n<h5>The Farnsworth Parabox</h5>\r\n<p>Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. We need rest. The spirit is willing, but the flesh is spongy and bruised. It must be wonderful.</p>', '2013-06-05 23:10:35'),
(3, 'How Hermes Requisitioned His Groove Back', '<p>You\'re going back for the Countess, aren\'t you? Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. Now Fry, it\'s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? I don\'t want to be rescued. Leela, are you alright? You got wanged on the head.</p>', '<h2>The Luck of the Fryrish</h2>\r\n<p>Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon\'s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can\'t just sit here in the dark listening to classical music.</p>\r\n<ul>\r\n<li>Who are those horrible orange men?</li>\r\n<li>Is today\'s hectic lifestyle making you tense and impatient?</li>\r\n</ul>\r\n<h3>Lethal Inspection</h3>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat. No. We\'re on the top. Does anybody else feel jealous and aroused and worried? Well I\'da done better, but it\'s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.</p>\r\n<h4>Where No Fan Has Gone Before</h4>\r\n<p>Who are those horrible orange men? Bender, we\'re trying our best. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.</p>\r\n<ol>\r\n<li>I\'m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.</li>\r\n<li>Stop it, stop it. It\'s fine. I will \'destroy\' you!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n</ol>\r\n<h5>Fear of a Bot Planet</h5>\r\n<p>Why yes! Thanks for noticing. Hey, guess what you\'re accessories to. Yes, except the Dave Matthews Band doesn\'t rock. Take me to your leader! Daddy Bender, we\'re hungry.</p>', '2013-06-05 23:20:24'),
(6, 'The Cyber House Rules', '<p>You guys realize you live in a sewer, right? Uh, is the puppy mechanical in any way? Come, Comrade Bender! We must take to the streets! I daresay that Fry has discovered the smelliest object in the known universe! Good news, everyone! There\'s a report on TV with some very bad news!</p>', '<h2>The Luck of the Fryrish</h2>\r\n<p>Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon\'s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can\'t just sit here in the dark listening to classical music.</p>\r\n<ul>\r\n<li>Who are those horrible orange men?</li>\r\n<li>Is today\'s hectic lifestyle making you tense and impatient?</li>\r\n</ul>\r\n<h3>Lethal Inspection</h3>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat. No. We\'re on the top. Does anybody else feel jealous and aroused and worried? Well I\'da done better, but it\'s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.</p>\r\n<h4>Where No Fan Has Gone Before</h4>\r\n<p>Who are those horrible orange men? Bender, we\'re trying our best. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.</p>\r\n<ol>\r\n<li>I\'m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.</li>\r\n<li>Stop it, stop it. It\'s fine. I will \'destroy\' you!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n</ol>\r\n<h5>Fear of a Bot Planet</h5>\r\n<p>Why yes! Thanks for noticing. Hey, guess what you\'re accessories to. Yes, except the Dave Matthews Band doesn\'t rock. Take me to your leader! Daddy Bender, we\'re hungry.</p>', '2013-06-06 08:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts_seo`
--

CREATE TABLE `blog_posts_seo` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postSlug` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts_seo`
--

INSERT INTO `blog_posts_seo` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postDate`) VALUES
(310, '1 Start page', '1-start-page310', NULL, '\n      \n      \n      \n      \n      \n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\"><div class=\"govuk-breadcrumbs ui-sortable-handle\"><ol class=\"govuk-breadcrumbs__list\"><li class=\"govuk-breadcrumbs__list-item\"><a class=\"govuk-breadcrumbs__link\" href=\"#\">Home</a></li><li class=\"govuk-breadcrumbs__list-item\"><a class=\"govuk-breadcrumbs__link\" href=\"#\">Passports, travel and living abroad</a></li><li class=\"govuk-breadcrumbs__list-item\" aria-current=\"page\">Travel abroad</li></ol></div><h1 class=\"govuk-heading-xl ui-sortable-handle\" style=\"\">Service name</h1></div></div><div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full activearea\">\n    \n    <div class=\"govuk-grid-column-one-third sortablelist connectedSortable ui-sortable ui-sortable-handle\">\n        <h3 class=\"govuk-heading-m ui-sortable-handle selected\">One-third column</h3>\n        <p class=\"govuk-body ui-sortable-handle\">This is a paragraph inside a one-third wide column</p>\n\n      </div>    <div class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third ui-sortable-handle\">\n        <h3 class=\"govuk-heading-m ui-sortable-handle\">One-third column</h3>\n        <p class=\"govuk-body ui-sortable-handle\">This is a paragraph inside a one-third wide column</p>\n\n      </div>    <div class=\"govuk-grid-column-one-third sortablelist connectedSortable ui-sortable ui-sortable-handle\">\n        <h3 class=\"govuk-heading-m ui-sortable-handle\">One-third column</h3>\n        <p class=\"govuk-body ui-sortable-handle\">This is a paragraph inside a one-third wide column</p>\n\n      </div>\n\n</div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds\"><a href=\"2-question-page311\" class=\"govuk-button govuk-button--start ui-sortable-handle\" style=\"position: relative; left: 0px; top: 2px;\">Start   </a><h1 class=\"govuk-heading-xl ui-sortable-handle\" contenteditable=\"true\" style=\"\">Service name</h1><p class=\"govuk-body ui-sortable-handle\">[[[waste]]]</p><h2 class=\"govuk-heading-l ui-sortable-handle\">Before you start</h2><p class=\"govuk-body ui-sortable-handle\" style=\"\">Additional information&nbsp;</p></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"></div></div>                            ', '2020-06-26 09:54:59'),
(311, 'qdwq2 Question page', '2-question-page311', NULL, '\n      \n      \n      \n      \n      \n      \n      \n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full activearea\"><h1 class=\"govuk-heading-xl ui-sortable-handle\" style=\"\">Question page</h1><a href=\"\" class=\"govuk-button govuk-button--warning ui-sortable-handle\" style=\"position: relative; left: 0px; top: 2px;\">Button</a><h5 class=\"govuk-heading-s ui-sortable-handle\" style=\"\">Heading 5</h5><a href=\"#\" class=\"govuk-back-link ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\">Back</a></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds\"><a href=\"#\" class=\"govuk-back-link ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\">Back</a><div class=\"govuk-form-group ui-sortable-handle\" style=\"\"> <fieldset class=\"govuk-fieldset\" aria-describedby=\"changed-name-hint\"> <legend class=\"govuk-fieldset__legend govuk-fieldset__legend--l\">  </legend> <span id=\"changed-name-hint\" class=\"govuk-hint\" contenteditable=\"true\">ffewqewq</span> <div class=\"govuk-radios govuk-radios--inline\"> <div class=\"govuk-radios__item\"> <input class=\"govuk-radios__input\" id=\"changed-name\" name=\"changed-name\" type=\"radio\" value=\"yes\"> <label class=\"govuk-label govuk-radios__label\" for=\"changed-name\"> Yes </label> </div><div class=\"govuk-radios__item\"> <input class=\"govuk-radios__input\" id=\"changed-name-2\" name=\"changed-name\" type=\"radio\" value=\"no\"> <label class=\"govuk-label govuk-radios__label\" for=\"changed-name-2\"> No </label> </div></div></fieldset></div><div class=\"govuk-form-group ui-sortable-handle\" style=\"\"><label class=\"govuk-label\" for=\"event-name\">Event name</label><input class=\"govuk-input\" id=\"event-name\" name=\"event-name\" type=\"text\"></div><h1 class=\"govuk-heading-m ui-sortable-handle\" style=\"\">Heading 3</h1></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"><div class=\"govuk-form-group ui-sortable-handle\" style=\"\"> <fieldset class=\"govuk-fieldset\" aria-describedby=\"changed-name-hint\"> <legend class=\"govuk-fieldset__legend govuk-fieldset__legend--l\"> <h1 class=\"govuk-fieldset__heading\"> Have you changed your name? </h1> </legend> <span id=\"changed-name-hint\" class=\"govuk-hint\"> This includes changing your last name or spelling your name differently. </span> <div class=\"govuk-radios govuk-radios--inline\"> <div class=\"govuk-radios__item\"> <input class=\"govuk-radios__input\" id=\"changed-name\" name=\"changed-name\" type=\"radio\" value=\"yes\"> <label class=\"govuk-label govuk-radios__label\" for=\"changed-name\"> Yes </label> </div><div class=\"govuk-radios__item\"> <input class=\"govuk-radios__input\" id=\"changed-name-2\" name=\"changed-name\" type=\"radio\" value=\"no\"> <label class=\"govuk-label govuk-radios__label\" for=\"changed-name-2\"> No </label> </div></div></fieldset></div><a href=\"3-add-address312\" class=\"govuk-button ui-sortable-handle\" style=\"position: relative; left: 0px; top: 2px;\">Continue</a><select class=\"govuk-select ui-sortable-handle\" id=\"sort\" name=\"sort\"><option value=\"published\">Recently published</option><option value=\"updated\" selected=\"\">Recently updated</option><option value=\"views\">Most views</option><option value=\"comments\">Most comments</option></select></div></div>                                    ', '2020-06-26 09:58:38'),
(312, '3 Add address', '3-add-address312', NULL, '\n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\"><a href=\"#\" class=\"govuk-back-link\">Back</a></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds activearea\"><fieldset class=\"govuk-fieldset\" style=\"\">\n  <legend class=\"govuk-fieldset__legend govuk-fieldset__legend--l\">\n    <h1 class=\"govuk-fieldset__heading\">\n      What is your address?\n    </h1>\n  </legend>\n\n  <div class=\"govuk-form-group\">\n    <label class=\"govuk-label\" for=\"address-line-1\">\n      Building and street <span class=\"govuk-visually-hidden\">line 1 of 2</span>\n    </label>\n    <input class=\"govuk-input\" id=\"address-line-1\" name=\"address-line-1\" type=\"text\" autocomplete=\"address-line1\" data-use-data=\"use-data\" value=\"\">\n  </div>\n\n  <div class=\"govuk-form-group\">\n    <label class=\"govuk-label\" for=\"address-line-2\">\n      <span class=\"govuk-visually-hidden\">Building and street line 2 of 2</span>\n    </label>\n    <input class=\"govuk-input\" id=\"address-line-2\" name=\"address-line-2\" type=\"text\" autocomplete=\"address-line2\" data-use-data=\"use-data\" value=\"\">\n  </div>\n\n  <div class=\"govuk-form-group\">\n    <label class=\"govuk-label\" for=\"address-town\">\n      Town or city\n    </label>\n    <input class=\"govuk-input govuk-!-width-two-thirds\" id=\"address-town\" name=\"address-town\" type=\"text\" autocomplete=\"address-level2\" data-use-data=\"use-data\" value=\"\">\n  </div>\n\n  <div class=\"govuk-form-group\">\n    <label class=\"govuk-label\" for=\"address-county\">\n      County\n    </label>\n    <input class=\"govuk-input govuk-!-width-two-thirds\" id=\"address-county\" name=\"address-county\" type=\"text\" data-use-data=\"use-data\" value=\"\">\n  </div>\n\n  <div class=\"govuk-form-group\">\n    <label class=\"govuk-label\" for=\"address-postcode\">\n      Postcode\n    </label>\n    <input class=\"govuk-input govuk-input--width-10\" id=\"address-postcode\" name=\"address-postcode\" type=\"text\" autocomplete=\"postal-code\" data-use-data=\"use-data\" value=\"\">\n  </div>\n\n</fieldset><a href=\"4-check-answers313\" class=\"govuk-button selected\">Continue</a></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"></div></div>        ', '2020-06-26 09:58:55'),
(313, '4 Check answers', '4-check-answers313', NULL, '\n      \n      \n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\"><a href=\"#\" class=\"govuk-back-link\" style=\"position: relative; left: 0px; top: 0px;\">Back</a></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds activearea\">\n        \n\n        <h1 class=\"govuk-heading-xl\">Check your answers</h1><table class=\"govuk-table\" style=\"\"><thead class=\"govuk-table__head\"> <tr class=\"govuk-table__row\"> <th scope=\"col\" class=\"govuk-table__header sortablelist connectedSortable ui-sortable\">Address line 1</th> <th scope=\"col\" class=\"govuk-table__header sortablelist connectedSortable ui-sortable\">[[[address-line-1]]]</th> </tr></thead> <tbody class=\"govuk-table__body\"> <tr class=\"govuk-table__row\"> <th scope=\"row\" class=\"govuk-table__header sortablelist connectedSortable ui-sortable\">Address town</th> <td class=\"govuk-table__cell sortablelist connectedSortable ui-sortable\">[[[address-town]]]</td></tr><tr class=\"govuk-table__row\"> <th scope=\"row\" class=\"govuk-table__header sortablelist connectedSortable ui-sortable\">County</th> <td class=\"govuk-table__cell sortablelist connectedSortable ui-sortable\">[[[address-town]]]</td></tr><tr class=\"govuk-table__row\"> <th scope=\"row\" class=\"govuk-table__header sortablelist connectedSortable ui-sortable\">Postcode</th> <td class=\"govuk-table__cell sortablelist connectedSortable ui-sortable selected\">[[[address-postcode]]]</td></tr></tbody></table></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"></div></div>                ', '2020-06-26 09:58:57'),
(314, 'heifoiew', 'heifoiew314', NULL, '\n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\"><div class=\"govuk-form-group ui-sortable-handle\" style=\"\">\n  <label class=\"govuk-label\" for=\"account-number\">\n    Account number\n  </label>\n  <span id=\"account-number-hint\" class=\"govuk-hint\"></span>\n  <input class=\"govuk-input govuk-input--width-10 govuk-!-margin-top-4\" id=\"account-number\" name=\"account-number\" type=\"text\" aria-describedby=\"account-number-hint\" pattern=\"[0-9]*\" inputmode=\"numeric\" spellcheck=\"false\" value=\"\">\n</div><a href=\"2-question-page311\" class=\"govuk-button govuk-!-margin-left-4 ui-sortable-handle govuk-!-margin-top-5 govuk-!-margin-right-9\" style=\"position: relative; left: 0px; top: 2px;\">Buttond</a><div class=\"govuk-form-group ui-sortable-handle\" style=\"\">\n  <label class=\"govuk-label\" for=\"name-on-the-account\">\n    Name on the account\n  </label>\n  <input class=\"govuk-input govuk-!-margin-top-2\" id=\"name-on-the-account\" name=\"name-on-the-account\" type=\"text\" spellcheck=\"false\" value=\"\">\n</div></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds activearea\">\n\n\n\n<div class=\"govuk-form-group ui-sortable-handle\">\n  <label class=\"govuk-label\" for=\"sort-code\">\n    Sort code\n  </label>\n  <span id=\"sort-code-hint\" class=\"govuk-hint\"></span>\n  <input class=\"govuk-input govuk-input--width-5\" id=\"sort-code\" name=\"sort-code\" type=\"text\" aria-describedby=\"sort-code-hint\" pattern=\"[0-9]*\" inputmode=\"numeric\" spellcheck=\"false\">\n</div>\n\n\n\n<a href=\"#\" class=\"govuk-back-link ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\">Back</a><div class=\"govuk-form-group ui-sortable-handle\" style=\"\">\n  <label class=\"govuk-label\" for=\"roll-number\">\n    Building society roll number (if you have one)\n  </label>\n  <span id=\"roll-number-hint\" class=\"govuk-hint selected\"></span>\n  <input class=\"govuk-input govuk-input--width-10\" id=\"roll-number\" name=\"roll-number\" type=\"text\" aria-describedby=\"roll-number-hint\" spellcheck=\"false\">\n</div>\n\n<button class=\"govuk-button connectedSortable ui-sortable-handle\" data-module=\"govuk-button\">\n  Continue\n</button></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"><h1 class=\"govuk-heading-l ui-sortable-handle\" style=\"\">Bank or building society account details</h1></div></div>                                                                                                            ', '2020-07-08 16:25:23'),
(315, 'New Screen', 'new-screen315', NULL, '\n      \n      \n      \n      \n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\">\n\n<div class=\"govuk-form-group ui-sortable-handle\" style=\"\">\n  <label class=\"govuk-label\" for=\"roll-number\">\n    Building society roll number (if you have one)\n  </label>\n  <span id=\"roll-number-hint\" class=\"govuk-hint\">\n    You can find it on your card, statement or passbook\n  </span>\n  <input class=\"govuk-input govuk-input--width-10\" id=\"roll-number\" name=\"roll-number\" type=\"text\" aria-describedby=\"roll-number-hint\" spellcheck=\"false\">\n</div><div class=\"govuk-form-group ui-sortable-handle\">\n  <label class=\"govuk-label\" for=\"name-on-the-account\">\n    Name on the account\n  </label>\n  <input class=\"govuk-input\" id=\"name-on-the-account\" name=\"name-on-the-account\" type=\"text\" spellcheck=\"false\">\n</div><h1 class=\"govuk-heading-l ui-sortable-handle\" style=\"\">ejfpfe</h1><div class=\"govuk-form-group ui-sortable-handle\" style=\"\">\n  <label class=\"govuk-label\" for=\"sort-code\">\n    Sort code\n  </label>\n  <span id=\"sort-code-hint\" class=\"govuk-hint\">\n    Must be 6 digits long\n  </span>\n  <input class=\"govuk-input govuk-input--width-5\" id=\"sort-code\" name=\"sort-code\" type=\"text\" aria-describedby=\"sort-code-hint\" pattern=\"[0-9]*\" inputmode=\"numeric\" spellcheck=\"false\">\n</div>\n\n\n\n\n\n<a class=\"govuk-button ui-sortable-handle\" href=\"3-add-address312\" style=\"position: relative; left: 0px; top: 2px;\">  Continue</a><div class=\"delete-edit item active ui-sortable-handle\">Delete</div><div class=\"item active ui-sortable-handle\" data-value=\"2-question-page311\">2 Question page</div><a class=\"govuk-button ui-sortable-handle\" href=\"#\" style=\"position: relative; left: 0px; top: 2px;\">\n  Continue\n</a>\n\n<div class=\"govuk-form-group ui-sortable-handle\"> <fieldset class=\"govuk-fieldset\" aria-describedby=\"changed-name-hint\"> <legend class=\"govuk-fieldset__legend govuk-fieldset__legend--l\"> <h1 class=\"govuk-fieldset__heading selected\"> Have you changed your name? </h1> </legend> <span id=\"changed-name-hint\" class=\"govuk-hint\"> This includes changing your last name or spelling your name differently. </span> <div class=\"govuk-radios govuk-radios--inline\"> <div class=\"govuk-radios__item\"> <input class=\"govuk-radios__input\" id=\"changed-name\" name=\"changed-name\" type=\"radio\" value=\"yes\" data-conditional-data=\"4-check-answers313\"> <label class=\"govuk-label govuk-radios__label\" for=\"changed-name\"> Yes </label> </div><div class=\"govuk-radios__item\"> <input class=\"govuk-radios__input\" id=\"changed-name-2\" name=\"changed-name\" type=\"radio\" value=\"no\"> <label class=\"govuk-label govuk-radios__label\" for=\"changed-name-2\"> No </label> </div></div></fieldset></div><div class=\"govuk-form-group\">\n  <label class=\"govuk-label\" for=\"national-insurance-number\">\n    National Insurance number\n  </label>\n  <div id=\"national-insurance-number-hint\" class=\"govuk-hint\">\n    It’s on your National Insurance card, benefit letter, payslip or P60. For example, ‘QQ 12 34 56 C’.\n  </div>\n  <input class=\"govuk-input govuk-input--width-10\" id=\"national-insurance-number\" name=\"national-insurance-number\" type=\"text\" spellcheck=\"false\" aria-describedby=\"national-insurance-number-hint\">\n</div><div class=\"govuk-form-group\" style=\"\">\n  <label class=\"govuk-label\" for=\"national-insurance-number\">\n    National Insurance number\n  </label>\n  <div id=\"national-insurance-number-hint\" class=\"govuk-hint\">\n    It’s on your National Insurance card, benefit letter, payslip or P60. For example, ‘QQ 12 34 56 C’.\n  </div>\n  <input class=\"govuk-input govuk-input--width-10\" id=\"national-insurance-number\" name=\"national-insurance-number\" type=\"text\" spellcheck=\"false\" aria-describedby=\"national-insurance-number-hint\">\n</div></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds\"><h2 class=\"govuk-heading-l ui-sortable-handle\" style=\"\">LGV</h2><div class=\"govuk-checkboxes__item ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\"><input class=\"govuk-checkboxes__input\" id=\"waste\" name=\"poo\" type=\"checkbox\" value=\"carcasses\" data-use-data=\"use-data\"><label class=\"govuk-label govuk-checkboxes__label\" for=\"waste\">LGV-MC: LGV multiple choice</label></div><div class=\"govuk-checkboxes__item ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\"><input class=\"govuk-checkboxes__input\" id=\"waste\" name=\"waste\" type=\"checkbox\" value=\"carcasses\"><label class=\"govuk-label govuk-checkboxes__label\" for=\"waste\">LGV-HTP: LGV hazard perception</label></div><div class=\"govuk-checkboxes__item ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\"><input class=\"govuk-checkboxes__input govuk-!-margin-bottom-9\" id=\"waste\" name=\"waste\" type=\"checkbox\" value=\"carcasses\"><label class=\"govuk-label govuk-checkboxes__label\" for=\"waste\">LGV-CPC: LGV driver CPC</label></div><h2 class=\"govuk-heading-l govuk-!-margin-bottom-8 ui-sortable-handle\" style=\"\">PVC</h2><div class=\"govuk-checkboxes__item ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\"><input class=\"govuk-checkboxes__input\" id=\"waste\" name=\"waste\" type=\"checkbox\" value=\"carcasses\"><label class=\"govuk-label govuk-checkboxes__label\" for=\"waste\">PCV-MC: PVC multiple choice&nbsp;</label></div><div class=\"govuk-checkboxes__item ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\"><input class=\"govuk-checkboxes__input\" id=\"waste\" name=\"waste\" type=\"checkbox\" value=\"carcasses\"><label class=\"govuk-label govuk-checkboxes__label\" for=\"waste\">PCV-HPT: PVC hazard perception</label></div><div class=\"govuk-checkboxes__item ui-sortable-handle\" style=\"position: relative; left: 0px; top: 0px;\"><input class=\"govuk-checkboxes__input\" id=\"waste\" name=\"waste\" type=\"checkbox\" value=\"carcasses\"><label class=\"govuk-label govuk-checkboxes__label\" for=\"waste\">PCV-CPC: PVCPVC driver CPC</label></div><a href=\"1-start-page310\" class=\"govuk-button ui-sortable-handle\">Continue</a></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third activearea\"><a href=\"\" class=\"govuk-button govuk-button--secondary ui-sortable-handle\" style=\"position: relative; left: 0px; top: 2px;\">Button</a></div></div>                        ', '2020-07-13 13:12:34'),
(316, 'New Screen', 'new-screen316', NULL, '\n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\"></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds activearea\"><h1 class=\"govuk-heading-l selected\">Bank or building society a32e32e32</h1>\n\n<div class=\"govuk-form-group\">\n  <label class=\"govuk-label\" for=\"name-on-the-account\">\n    Name on the account\n  </label>\n  <input class=\"govuk-input\" id=\"name-on-the-account\" name=\"name-on-the-account\" type=\"text\" spellcheck=\"false\">\n</div>\n\n\n\n<div class=\"govuk-form-group\">\n  <label class=\"govuk-label\" for=\"account-number\">\n    Account number\n  </label>\n  <span id=\"account-number-hint\" class=\"govuk-hint\">\n    Must be between 6 and 8 digits long\n  </span>\n  <input class=\"govuk-input govuk-input--width-10\" id=\"account-number\" name=\"account-number\" type=\"text\" aria-describedby=\"account-number-hint\" pattern=\"[0-9]*\" inputmode=\"numeric\" spellcheck=\"false\">\n</div>\n\n<div class=\"govuk-form-group\">\n  <label class=\"govuk-label\" for=\"roll-number\">\n    Building society roll number (if you have one)\n  </label>\n  <span id=\"roll-number-hint\" class=\"govuk-hint\">\n    You can find it on your card, statement or passbook\n  </span>\n  <input class=\"govuk-input govuk-input--width-10\" id=\"roll-number\" name=\"roll-number\" type=\"text\" aria-describedby=\"roll-number-hint\" spellcheck=\"false\">\n</div>\n\n<button class=\"govuk-button\" data-module=\"govuk-button\">\n  Continue\n</button></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"><div class=\"govuk-form-group\" style=\"\">\n  <label class=\"govuk-label\" for=\"sort-code\">\n    Sort code\n  </label>\n  <span id=\"sort-code-hint\" class=\"govuk-hint\">\n    Must be 6 digits long\n  </span>\n  <input class=\"govuk-input govuk-input--width-5\" id=\"sort-code\" name=\"sort-code\" type=\"text\" aria-describedby=\"sort-code-hint\" pattern=\"[0-9]*\" inputmode=\"numeric\" spellcheck=\"false\">\n</div></div></div>    ', '2020-07-23 14:09:18'),
(317, 'New Screen', 'new-screen317', NULL, '\n      \n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-full\"></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds activearea\"><a href=\"1-start-page310\" class=\"govuk-button ui-sortable-handle selected\" style=\"position: relative; left: 0px; top: 2px;\">Button</a></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"></div></div>        ', '2020-07-30 14:22:48'),
(318, 'Newhihiuohvdiosfeen', 'new-screen318', NULL, '\n      <div class=\"govuk-grid-row\"><div id=\"area-1\" class=\"sortablelist connectedSortable activearea ui-sortable govuk-grid-column-full\"></div></div><div class=\"govuk-grid-row\"><div id=\"area-2\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds\"></div><div id=\"area-3\" class=\"sortablelist connectedSortable ui-sortable govuk-grid-column-one-third\"></div></div>    ', '2020-08-06 13:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_cats`
--

CREATE TABLE `blog_post_cats` (
  `id` int(11) UNSIGNED NOT NULL,
  `postID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_cats`
--

INSERT INTO `blog_post_cats` (`id`, `postID`, `catID`) VALUES
(33, 0, 1),
(34, 0, 6),
(35, 0, 1),
(36, 0, 6),
(39, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `date_points`
--

CREATE TABLE `date_points` (
  `dp_ID` int(11) NOT NULL,
  `projectID` varchar(20) NOT NULL,
  `dp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_ID` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_ID`, `tag`) VALUES
(1, 'main'),
(2, 'cooking'),
(3, 'main'),
(4, 'cooking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_cats`
--
ALTER TABLE `blog_cats`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `blog_members`
--
ALTER TABLE `blog_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `blog_posts_seo`
--
ALTER TABLE `blog_posts_seo`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `blog_post_cats`
--
ALTER TABLE `blog_post_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_points`
--
ALTER TABLE `date_points`
  ADD PRIMARY KEY (`dp_ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_cats`
--
ALTER TABLE `blog_cats`
  MODIFY `catID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_posts_seo`
--
ALTER TABLE `blog_posts_seo`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `blog_post_cats`
--
ALTER TABLE `blog_post_cats`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `date_points`
--
ALTER TABLE `date_points`
  MODIFY `dp_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

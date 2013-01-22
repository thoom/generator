Thoom\\Generator
----------------

These classes are static classes that generate various values that you may need in the an application. I frequently use
the RandomString methods to build temporary passwords, and the Uuid class to create unique ids to entities that are put/posted
to a collections url.

### Usage

To create a Uuid:

    $uuid = Thoom\Generator\Uuid::v4();
    //outputs something like: ef8dbbaf-681a-4329-b58c-262a6c2c1fb4


To create a random alphanumeric string, lowercase only, 16 characters:

    use Thoom\Generator\RandomString;

    // .... code ... //

    $string = RandomString::alnum(16, RandomString::ALPHANUM_LOWER);
    //outputs something like: asb0z93dg91st73l


To add custom characters (like a dash) to a random string:

    use Thoom\Generator\RandomString;

    // .... code ... //

    $string = RandomString::user(16, array('-'), RandomString::ALPHANUM_LOWER);
    //outputs something like: p2am-53s9xrzb63n